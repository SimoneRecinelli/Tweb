<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewStaffRequest extends FormRequest {

    /**
     *  Determina se l'user è autorizzato a fare questa richiesta
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Definiamo le regole di validazione da applicare 
     * nella funzione "storeStaff" nell'AdminController
     *
     * @return array
     */
    public function rules() {
        return [

            /* L'espressione "regex:/^[\p{L}\s]+$/u" permette di scrivere stringhe
            contenenti solo lettere e spazi e può essere lunga da uno a più caratteri */

            'nome' => 'required|string|min:3|regex:/^[\p{L}\s]+$/u',
            'cognome' => 'required|string|min:3|regex:/^[\p{L}\s]+$/u',
            'email' => 'required|email|max:255',
            'eta' => 'required|integer|min:1|max:100',
            'telefono' => 'required|string|min:10|regex:/^[+\s0-9]+$/i',
            'residenza' => 'required|min:3|regex:/^[\p{L}\s]+$/u',
            'username' => 'required|string|min:8|unique:users',
            'password' => 'required|min:8',
            'genere' => 'required|string'
        ];
        
    }

}