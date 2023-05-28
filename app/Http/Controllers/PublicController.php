<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Azienda;
use App\Models\Offerta;
use App\Models\Faq;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Carbon\Carbon;



class PublicController extends Controller
{

    public function showHome(): View
{
    return view('UnregisteredUserViews.home');
}

public function showCatalog($Categoria = null): View {
    $categorie = Offerta::all()->pluck('Categoria')->unique();
    $query = Offerta::query();

    if (isset($Categoria)) {
        $query->where('Categoria', $Categoria);
        $catselezionata = $Categoria;
    } else {
        $catselezionata = null;
    }

    //$query->where('Scadenza', '>=', Carbon::now())->get();

    $offerte = $query->paginate(10);

    return view('UnregisteredUserViews.catalogo')
        ->with('offerte', $offerte)
        ->with('categorie', $categorie)
        ->with('catselezionata', $catselezionata);
}



public function showAziende() {
    $azienda = new Azienda();
    $aziende = $azienda::paginate(10);
    return view('UnregisteredUserViews.aziende', compact('aziende'));
}


public function showSingleAzienda($idAzienda): View
{
    $selAzienda = Azienda::all()->where('idAzienda', $idAzienda)->first();
    $offerte = Offerta::getByAzienda($selAzienda->NomeAzienda);
    return view('UnregisteredUserViews.paginaazienda')->with('selAzienda',$selAzienda)->with('offerte',$offerte);
}

     public function showFaq(): View {
        $faqs = Faq::paginate(10);
        return view('UnregisteredUserViews.faq', compact('faqs'));
    }

    /**
     * Show info page for a public user.
     */
    public function showInfo(): View {
        return view('UnregisteredUserViews.info');
    }

    /**
     * Show coupon page for a public user.
     */

     /*
    public function showCoupon($idOfferta): View {
        $selOfferta = Offerta::all()->where('idOfferta', $idOfferta)->first();
        
        return view('UnregisteredUserViews.coupon')->with('selOfferta',$selOfferta);
    }
    */
    
    public function search(Request $request)
    {
        $descrizione = $request->input('descrizione');
        $azienda = $request->input('azienda');
    
        $query = Offerta::query();
    
        if (!empty($descrizione) && empty($azienda)) {
            $query->where('DescrizioneOfferta', 'like', '%' . $descrizione . '%');
        } else if (empty($descrizione) && !empty($azienda)) {
            $query->where('NomeAzienda', 'like', '%' . $azienda . '%');
        } else if (!empty($descrizione) && !empty($azienda)) {
            $query->where('NomeAzienda', 'like', '%' . $azienda . '%')
                ->where('DescrizioneOfferta', 'like', '%' . $descrizione . '%');
        }

        //$query->where('Scadenza', '>=', Carbon::now())->get();
    
        $results = $query->paginate(10);
        $results->appends(['descrizione' => $descrizione, 'azienda' => $azienda]);
    
        $categorie = Offerta::pluck('Categoria')->unique();  
    
        return view('UnregisteredUserViews.catalogo')->with('offerte', $results)->with('categorie', $categorie)->with('descrizione', $descrizione)->with('azienda', $azienda);
    }
    
    


    public function paginate_index()
    {
        $offerta_pagin = Catalog::paginate(10); // Ottieni le offerte paginate, 10 per pagina

        return view('UnregisteredUserViews.catalogo', compact('offerta_pagin'));
    }

    


public function homeScadenza() : View
{
    $offerte=Offerta::getOfferte();
    $prossimeOfferte = Offerta::getOfferteABreve();

    return view('UnregisteredUserViews.home', ['prossimeOfferte' => $prossimeOfferte], ['offerte' => $offerte]);
}


public function expiredCoupon($idOfferta){
    $selOfferta = Offerta::getOffertaById($idOfferta);
    if ($selOfferta->Scadenza >= Carbon::now()) {
        return view('UnregisteredUserViews.coupon')->with('selOfferta',$selOfferta);;
    }
    else {
        return view('UnregisteredUserViews.expiredcoupon')->with('selOfferta',$selOfferta);
    }
}


}

