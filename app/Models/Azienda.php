<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'Aziende';
    protected $primaryKey = 'idAzienda';
    public $timestamps = false;

    public function getAziende(){
        return Azienda::all()->pluck('NomeAzienda');
    }

    public function getAllAziende() {
        return Azienda::all();
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

    public function getAzienda($idAzienda){
        return Azienda::where('idAzienda',$idAzienda)->first();
    }

}
