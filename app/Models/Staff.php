<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Staff extends Model {

    protected $table = 'users';


    /**
     * array che specifica quali attributi possono essere assegnati in modo massivo
     * 
     */
    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'username',
        'password',
        'possibilità_abbinamento',
        'eta',
        'genere',
        'residenza',
        'telefono',
    ];

    /**
     * Array che specifica gli attributi che devono essere nascosti nella serializzazione.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'username',
        'password',
    ];

    /**
     * Metodo utilizzato per estratte dati dal DB che 
     * 
     * Restituisce un elenco paginato di tutto staff 
     * (10 per pagina) 
     */
    public static function getStaff() {
        $staff = User::where('role','staff')->paginate(10); //where filtra user per il ruolo staff
        return $staff;
    }

    /**
     * Metodo che prende in ingresso un parametro $id,utilizzato per estrarre dati dal DB
     * 
     * Restituisce un'istanza della classe Staff corrispondente all'ID specificato 
     */
    public static function getStaffById($id){
        return Staff::where('role','staff')->where('id',$id)->first(); // 1° where filtra user per il ruolo staff 
                                                                       // 2° where filtra user per id
    }


}