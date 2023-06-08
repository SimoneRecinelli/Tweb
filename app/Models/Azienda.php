<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'Aziende';
    protected $primaryKey = 'idAzienda';
    public $timestamps = false;


    /** Mwtodo utilizzato per estratte dal DB tutte le istanze della classe Azienda 
     * 
     * Restituisce un elenco dei nomi delle aziende (NomeAzienda)
     */  
    public static function getAziende(){
        return Azienda::all()->pluck('NomeAzienda');
    }

    /**
     * Metodo utilizzato per estratte dati dal DB
     * 
     * Restituisce un elenco di tutte le aziende
     */
    public static function getAllAziende() {
        return Azienda::all();
    }

    /**
     * Metodo utilizzato per estratte dati dal DB
     * 
     * Restituisce un elenco paginato di tutte le aziende
     * (9 aziende per pagina) 
     */
     public static function getAziendePaginate() {
        return Azienda::orderBy('nomeAzienda', 'asc')->paginate(9);  // Ordina le aziende per il campo 'nome' in ordine alfabetico ascendente e paginazione con 9 elementi per pagina
    }

    /**
     * Metodo che prende in ingresso un parametro $num, utilizzato per estrarre dati dal DB
     * Al suo interno troviamo un foreach dove ad ogni iterazione che non soddisfa l'if "$i" incrementa di 1
     * 
     * Se l'IF è soddifatto restituisce il nome dell'azienda e il loop termina tramite break
     * 
     * Va messa nella select di iserimento offerta per estrarre il nome 
     */
    public function getNome($num){
        $i=0;
        $aziende=Azienda::all(); //viene ottenuta una collezione di tutte le istanze di Azienda 
        foreach($aziende as $azienda){ //foreach che scorre per ogni azienda
            if($i==$num){
                return $azienda->NomeAzienda;break;
        }
        else{
            $i++;
        }
        }
    }

    /**
     * Metodo che prende in ingresso un parametro $idAzienda, utilizzato per estrarre dati dal DB 
     * 
     * Restituisce un'istanza della classe Azienda corrispondente all'ID specificato 
     */
    public static function getAziendaById($idAzienda){

        return Azienda::where('idAzienda',$idAzienda)->first(); //where viene utilizzato per filtrare in base all'idAzienda 
                                                                //first restituisce solo la prima istanza che soddisfa il filtro
        
    }

    public function selectAziende($offerte){
        $items = Azienda::pluck('NomeAzienda', 'idAzienda');
            $selected=Azienda::where('NomeAzienda',$offerte->NomeAzienda)->get('idAzienda');
            return [
                'items' => $items,
                'selected' => $selected,
            ];
    }

}
