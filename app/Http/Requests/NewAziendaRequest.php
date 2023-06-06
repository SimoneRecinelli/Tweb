<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewAziendaRequest extends FormRequest {

    /**
     * Determina se l'user è autorizzato a fare questa richiesta
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
     * nella funzione "storeazienda" nell'AdminController
     *      
     * @return array
     */
    public function rules() {
        return [

            /* L'espressione "regex:/^[\p{L}\s]+$/u" permette di scrivere stringhe
            contenenti solo lettere e spazi e può essere lunga da uno a più caratteri */
            
            'NomeAzienda' => 'required|string|min:3|unique:Aziende|regex:/^[\p{L}\s]+$/u',
            'Sede' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
            'Tipologia' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'RagioneSociale' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
            'image' => 'image|max:1024|mimes:jpeg,png,jpg',
            'Descrizione' => 'required|min:10',
        ];
    }

}