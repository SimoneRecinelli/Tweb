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

    public function getCat(){
        $categorie = Offerta::all()->pluck('Categoria')->unique();  
        return $categorie;
    }
}
