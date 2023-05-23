<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Azienda;
use App\Models\Offerta;
use App\Models\Faq;
use App\Models\Catalog;
use Illuminate\Http\Request;



class PublicController extends Controller
{

    protected $_catalogModel;
    protected $_companyModel;


    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->_companyModel = new Azienda;


    }


    public function showHome(): View
    {
        $offerteInEvidenza = Offerta::where('Evidenza', 'sì')->get();
        return view('home', ['offerte' => $offerteInEvidenza]);
    }
    

/*
    
    public function showCatalog1() {

        //Categorie Top
        $topCats = $this->_catalogModel->getTopCats();

        //Prodotti in sconto di tutte le categorie, ordinati per sconto decrescente
        $prods = $this->_catalogModel->getProdsByCat($topCats->map->only(['catId']), 2, 'desc', true);

        return view('catalog')
                        ->with('topCategories', $topCats)
                        ->with('products', $prods);
    }

    public function showCatalog2($topCatId) {

        //Categorie Top
        $topCats = $this->_catalogModel->getTopCats();

        //Categoria Top selezionata
        $selTopCat = $topCats->where('catId', $topCatId)->first();

        // Sottocategorie
        $subCats = $this->_catalogModel->getCatsByParId([$topCatId]);

        //Prodotti in sconto della categoria Top selezionata, ordinati per sconto decrescente
        $prods = $this->_catalogModel->getProdsByCat([$topCatId], 2, 'desc', true);

        return view('catalog')
                        ->with('topCategories', $topCats)
                        ->with('selectedTopCat', $selTopCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prods);
    }

    public function showCatalog3($topCatId, $catId) {

        //Categorie Top
        $topCats = $this->_catalogModel->getTopCats();

        //Categoria Top selezionata
        $selTopCat = $topCats->where('catId', $topCatId)->first();

        // Sottocategorie
        $subCats = $this->_catalogModel->getCatsByParId([$topCatId]);

        // Prodotti della categoria selezionata, in sconto o meno
       $prods = $this->_catalogModel->getProdsByCat([$catId]);

        return view('catalog')
                        ->with('topCategories', $topCats)
                        ->with('selectedTopCat', $selTopCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prods);
    }

*/

public function showCatalog($Categoria='Animali'): View {
    $offerte = $this->_catalogModel->getOffByCat($Categoria);
    return view('catalog')->with('offerte',$offerte);
       
} 

public function showAziende(){ 
    $aziende=$this->_companyModel->getAziende();
    $aziende=Azienda::paginate(1);
    return view('aziende')
         ->with('aziende',$aziende);
}

/*public function showAziende()
{
    $aziende = Azienda::all();
    
    return view('aziende', compact('aziende'));
}*/

public function showSingleAzienda($id): View
{
    $selAzienda = Azienda::all()->where('id', $id)->first();

    return view('paginaazienda')->with('selAzienda',$selAzienda);
}

/**
     * Show faq page for a public user.
     */
    public function showFaq(): View {
        $faqs=Faq::all();
        return view('faq')->with('faqs',$faqs);
    }
    /**
     * Show info page for a public user.
     */
    public function showInfo(): View {
        return view('info');
    }
    /**
     * Show login page for a public user.
     */
    public function showLogin(): View {
        return view('login');
    }
    /**
     * Show coupon page for a public user.
     */
    public function showCoupon($IdOfferta): View {
        $selOfferta = Offerta::all()->where('IdOfferta', $IdOfferta)->first();
        
        return view('coupon')->with('selOfferta',$selOfferta);
    }

    public function search(Request $request)
    {
        $oggetto = $request->input('oggetto');
        $azienda = $request->input('azienda');
        
        if(isset($oggetto)&&($azienda==null))
        {
            $results = Offerta::where('Oggetto', 'like', '%' . $oggetto . '%')->get();
        }
        else if(isset($azienda)&&($oggetto==null))
        {
            $results = Offerta::where('Azienda', 'like', '%' . $azienda . '%')->get();
        }

        else if(isset($oggetto)&&(isset($azienda))) {
            $results = Offerta::where('Azienda', 'like', '%' . $azienda . '%')->where('Oggetto', 'like', '%' . $oggetto . '%')->get();
        }
        else{
            $results = Offerta::all();
        }
        

        $categorie = Offerta::all()->pluck('Categoria')->unique();  
        
        return view('catalogo')->with('offerte' , $results)->with('categorie',$categorie);
        
    }


    public function showStampaCoupon(): View{
        return view('stampacoupon');
    }

    public function paginate_index()
    {
        $offerta_pagin = Catalog::paginate(10); // Ottieni le offerte paginate, 10 per pagina

        return view('catalogo', compact('offerta_pagin'));
    }

   


}

