<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'Aziende';
    public $timestamps = false;

    public function getAziende(){
        return Azienda::all();
    }
}
