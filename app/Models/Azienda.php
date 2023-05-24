<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'Aziende';
    public $timestamps = false;

    public function getAziende(){

        return Azienda::all()->pluck('NomeAzienda');
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

}
