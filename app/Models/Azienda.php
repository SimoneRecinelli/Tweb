<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'Aziende';
    protected $primaryKey = 'idAzienda';
    public $timestamps = false;

    public static function getAziende(){
        return Azienda::all()->pluck('NomeAzienda');
    }

    public static function getAllAziende() {
        return Azienda::all();
    }

    public static function getAziendePaginate() {
        return Azienda::paginate(9);
    }

    //va messa nella select di iserimento offerta per estrarre il nome 
    public function getNome($num){
        $i=0;
        $aziende=Azienda::all();
        foreach($aziende as $azienda){
            if($i==$num){
                return $azienda->NomeAzienda;break;
        }
        else{
            $i++;
        }
        }
    }

    public static function getAziendaById($idAzienda){

        return Azienda::where('idAzienda',$idAzienda)->first();
        
    }

}
