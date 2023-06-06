<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table= 'Faqs';
    public $timestamps = false;


     /**
     * Metodo utilizzato per estratte dati dal DB 
     *  
     * Restituisce un elenco di tutte le faq
     */
    public static function getFaqs(){
        return Faq::all();
    }

    /**
     * Metodo utilizzato per estratte dati dal DB
     * 
     * Restituisce un elenco paginato di tutte le faq
     * (10 faq per pagina) 
     */
    public static function getFaqsPaginate(){
        return Faq::paginate(10);
    }
    

    /**
     * Metodo che prende in ingresso un parametro $id, utilizzato per estrarre dati dal DB
     * 
     * Restituisce un'istanza della classe Faq corrispondente all'ID specificato 
     */
    public static function getFaqById($id) {
        return Faq::where('id', $id)->first();
    }
}
