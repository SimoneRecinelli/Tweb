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
    
    public function __construct() {
        $this->_catalogModel = new Catalog;
    }


    public function showHome(): View
{
    $offerteInEvidenza = Offerta::getOfferteEvidenza();
    return view('home', ['offerte' => $offerteInEvidenza]);
}
    

public function showCatalog($Categoria='Animali'): View {
    $offerte = $this->_catalogModel->getOffByCat($Categoria);
    return view('catalog')->with('offerte',$offerte);
} 

public function showAziende() { 
    $aziende = Azienda::paginate(2);
    return view('aziende', compact('aziende'));
}


/* funzione prima di inserire il paginate
public function showAziende()
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
        $faqs = Faq::paginate(4);
        return view('faq', compact('faqs'));
    }
    

  /*  public function showFaq(): View {
        $faqs=Faq::all();
        return view('faq')->with('faqs',$faqs);
    }*/
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
    public function showCoupon($id): View {
        $selOfferta = Offerta::all()->where('id', $id)->first();
        
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

