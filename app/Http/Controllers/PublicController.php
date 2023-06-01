<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Azienda;
use App\Models\Offerta;
use App\Models\Faq;
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

    $offerte = $query->paginate(8);

    return view('UnregisteredUserViews.catalogo')
        ->with('offerte', $offerte)
        ->with('categorie', $categorie)
        ->with('catselezionata', $catselezionata);
}



public function showAziende() {
    $azienda = new Azienda();
    $aziende = $azienda::GetAziendePaginate();
    return view('UnregisteredUserViews.aziende', compact('aziende'));
}


public function showSingleAzienda($idAzienda): View
{
    $selAzienda = Azienda::getAziendaById($idAzienda);
    if ($selAzienda != null) {
        $offerte = Offerta::getByAzienda($selAzienda->NomeAzienda);
        return view('UnregisteredUserViews.paginaazienda')->with('selAzienda',$selAzienda)->with('offerte',$offerte);
    } 
    else return view('error');
}

public function showFaq(): View {
    $faqs = Faq::getFaqsPaginate();
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
    
public function homeScadenza() : View
{
    $offerte=Offerta::getOfferte();
    $prossimeOfferte = Offerta::getOfferteABreve();

    return view('UnregisteredUserViews.home', ['prossimeOfferte' => $prossimeOfferte], ['offerte' => $offerte]);
}

public function expiredCoupon($idOfferta){
    $selOfferta = Offerta::getOffertaById($idOfferta);

    if ($selOfferta != null && $selOfferta->Scadenza >= Carbon::now()) {
        return view('UnregisteredUserViews.coupon')->with('selOfferta',$selOfferta);
    }
    elseif ($selOfferta != null && $selOfferta->Scadenza < Carbon::now()) {
        return view('UnregisteredUserViews.expiredcoupon')->with('selOfferta',$selOfferta);
    }
    else {
        return view('error');
    }
}




}

