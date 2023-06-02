<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Offerta extends Model
{
    protected $table = 'Offerte';
    protected $primaryKey = 'idOfferta';

    public $timestamps = false;
    
    public static function getOfferte() {
        return Offerta::all();
    }

    public static function getOffertePaginate() {
        return Offerta::paginate(10);
    }

    public static function getOffertaById($idOfferta) {
        return Offerta::where('idOfferta', $idOfferta)->first();
    }
    

    public static function getByAzienda($NomeAzienda){

        $offerte = Offerta::where('NomeAzienda',$NomeAzienda)->get();
         return $offerte;
    }

    public static function getOfferteABreve(){
        $giorniPredefiniti = 135; 
    
        $offerte = Offerta::where('Scadenza', '>=', Carbon::now())
                          ->where('Scadenza', '<=', Carbon::now()->addDays($giorniPredefiniti))
                          ->orderBy('Scadenza')
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
