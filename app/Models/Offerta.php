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
}
