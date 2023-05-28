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
        $offerte = Offerta::where('Scadenza', '>=', Carbon::now())
                            ->where('Scadenza', '<=', '2023/09/01')
                            ->orderBy('Scadenza')
                            //->take(1) // Puoi personalizzare il numero di offerte
                            ->get();
        return $offerte;
    }
}
