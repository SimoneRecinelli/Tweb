<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Offerta extends Model
{
    protected $table = 'Offerte';
    protected $primaryKey = 'idOfferta';
/*
    public function getCat(){
        $categorie = Offerta::all()->pluck('Categoria')->unique();
        return $categorie;
    }
    */

    public $timestamps = false;

    public static function getOfferte() {
        return Offerta::all();
    }

    public static function getOfferteEvidenza(){
        $offerteInEvidenza = Offerta::where('Evidenza', 'sì')->take(4)->get();
        return $offerteInEvidenza;
    }

    public function getbyazienda($NomeAzienda){

        $offerte = Offerta::where('NomeAzienda',$NomeAzienda)->get();
         return $offerte;
    }
}
