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
    $offerteInEvidenza = Offerta::getOfferteEvidenza();
    return view('UnregisteredUserViews.home', ['offerte' => $offerteInEvidenza]);
}
  
public function showCatalog($Categoria = null): View {
    $categorie = Offerta::all()->pluck('Categoria')->unique();
    $query=Offerta::query();

    if(isset($Categoria)){
        $query->where('Categoria', $Categoria);
        $catselezionata = $Categoria;
    } else {
        $catselezionata = null;
    }

    $offerte = $query->paginate(2);

    return view('UnregisteredUserViews.catalogo')
        ->with('offerte', $offerte)
        ->with('categorie', $categorie)
        ->with('catselezionata', $catselezionata);
}


public function showAziende() { 
    $aziende = Azienda::getAziende()->paginate(3);
    return view('UnregisteredUserViews.aziende', compact('aziende'));
}


public function showSingleAzienda($idAzienda): View
{
    $selAzienda = Azienda::all()->where('idAzienda', $idAzienda)->first();
    $offerte = new Offerta;
    $offerte = $offerte->getbyazienda($selAzienda->NomeAzienda);
    return view('UnregisteredUserViews.paginaazienda')->with('selAzienda',$selAzienda)->with('offerte',$offerte);
}

     public function showFaq(): View {
        $faqs = Faq::paginate(4);
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
    public function showCoupon($idOfferta): View {
        $selOfferta = Offerta::all()->where('idOfferta', $idOfferta)->first();
        
        return view('UnregisteredUserViews.coupon')->with('selOfferta',$selOfferta);
    }
    
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
    
        $results = $query->paginate(2);
        $results->appends(['descrizione' => $descrizione, 'azienda' => $azienda]); // Aggiungi i parametri di ricerca all'URL dei link del paginator
    
        $categorie = Offerta::pluck('Categoria')->unique();  
    
        return view('UnregisteredUserViews.catalogo')->with('offerte', $results)->with('categorie', $categorie)->with('descrizione', $descrizione)->with('azienda', $azienda);
    }
    
    


    public function paginate_index()
    {
        $offerta_pagin = Catalog::paginate(10); // Ottieni le offerte paginate, 10 per pagina

        return view('UnregisteredUserViews.catalogo', compact('offerta_pagin'));
    }

    


/*public function homeScadenza() : View
{
    $offerte=Offerta::all();
    $prossimeOfferte = Offerta::where('Scadenza', '>=', Carbon::now())
        ->where('Scadenza', '<=', '2023/09/01')
        ->orderBy('Scadenza')
        //->take(1) // Puoi personalizzare il numero di offerte
        ->get();

    return view('UnregisteredUserViews.home', ['prossimeOfferte' => $prossimeOfferte], ['offerte' => $offerte]);
}*/


}

