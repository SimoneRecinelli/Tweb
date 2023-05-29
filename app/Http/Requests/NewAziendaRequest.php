<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewAziendaRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'NomeAzienda' => 'required|string|min:3|unique:Aziende|regex:/^[\p{L}\s]+$/u',
            'Sede' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
            'Tipologia' => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'RagioneSociale' => 'required|min:3|regex:/^[\p{L}0-9\s.,\-]+$/u',
            'image' => 'image|max:1024|mimes:jpeg,png,jpg',
            'Descrizione' => 'required|min:10',
        ];
    }

}