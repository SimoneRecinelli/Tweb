<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Offerta extends Model
{
    protected $table = 'Offerte';
    protected $primaryKey = 'idOfferta';   //riconosce come chiave primaria idOfferta e non il default id

    public $timestamps = false;


    /**
     * Metodo utilizzato per estratte dati dal DB
     *
     * Restituisce un elenco di tutte le offerte
     */
    public static function getOfferte() {
        return Offerta::all();
    }

    /**
     * Metodo utilizzato per estratte dati dal DB
     *
     * Restituisce un elenco paginato di tutte le offerte
     * (10 per pagina)
     */
    public static function getOffertePaginate() {
        return Offerta::paginate(8);
    }

    /**
     * Metodo utilizzato per estrarre dati dal DB, prende in ingresso un parametro $idOfferta
     *
     * Restituisce un'istanza della classe Offerta corrispondente all'ID specificato
     */
    public static function getOffertaById($idOfferta) {
        return Offerta::where('idOfferta', $idOfferta)->first();
    }

    /**
     * Metodo utilizzato per estrarre dati dal DB, prende in ingresso un parametro $NomeAzienda
     *
     * Restituisce un'istanza della classe Offerta corrispondente al NomeAzienda specificato
     */
    public static function getByAzienda($NomeAzienda){

        $offerte = Offerta::where('NomeAzienda',$NomeAzienda)->get();
        return $offerte;
    }

    /**
     * Metodo utilizzato per estrarre dati dal DB, fa un controllo sulla data di scadenza
     * tramite Carbon::now() ricaviamo la data odierna, con addDays a tale data aggiungiamo un
     * numero di giorni prefissato ($giorniPredefiniti)
     *
     * Restituisce un'istanza della classe Offerta con data di Scadenza compresa  tra la data odierna
     * e la data odierna sommata con $giorniPredefinti
     *
     * Tutto viene ordinato in basea alla Scadenza
     */
    public static function getOfferteABreve(){
        $giorniPredefiniti = 135;

        $offerte = Offerta::where('Scadenza', '>=', Carbon::now())
            ->where('Scadenza', '<=', Carbon::now()->addDays($giorniPredefiniti))
            ->orderBy('Scadenza')
            ->get();
        return $offerte;
    }
    
    /**
     * Metodo utilizzato per estrarre dati dal DB, fa un controllo sulla data di scadenza
     *
     * Restituisce tutte le offerte non scadute con Evidenza=si
     */
    public static function getOfferteEvidenzaUnexpired(){

        $offerte = Offerta::where('Scadenza', '>=', Carbon::now())
            ->where('Evidenza' , 'si')
            ->get();
        return $offerte;
    }

    /**
     * Metodo che estrae estrae tutti gli attributi categoria delle offerte e in caso di duplicati ne prende solo uno
     */
    public function getCat(){
        $categorie = Offerta::all()->pluck('Categoria')->unique();
        return $categorie;
    }

    /**
     * Metodo prende in ingresso un parametro $descrizione, utilizzato per estrarre dati dal DB
     *
     * Restituisce le offerte per descrizione
     */
    public function getOffertaByDesc($descrizione){
        $offerte=Offerta::where('DescrizioneOfferta', 'like', '%' . $descrizione . '%');
        return $offerte;
    }

    /**
     * Metodo che prende in ingresso un parametro $azienda, utilizzato per estrarre dati dal DB
     *
     * Restituisce le offerte che corrispondono all'azienda passata in ingresso
     * (il filtraggio è fatto su NomeAzienda)
     */
    public function getOffertaByAz($azienda){
        $offerte=Offerta::where('NomeAzienda', 'like', '%' . $azienda . '%');
        return $offerte;
    }

    /**
     * Metodo che prende in ingresso i parametri $descrizione e $azienda, utilizzato per estrarre dati dal DB
     *
     * Restituisce le offerte che corrispondono alla descrizione e all'azienda 4
     * (il filtraggio è fatto su NomeAzienda e DescrizioneOfferta insieme)
     */
    public function getOffertaByDescEAz($descrizione,$azienda){
        $offerte=Offerta::where('NomeAzienda', 'like', '%' . $azienda . '%');
        $offerte=$offerte->where('DescrizioneOfferta', 'like', '%' . $descrizione . '%');
        return $offerte;
    }


}
