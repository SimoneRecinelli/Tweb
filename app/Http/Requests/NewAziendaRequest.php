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
            'NomeAzienda' => 'required|max:25',
            'Sede' => 'required|max:30',
            'Tipologia' => 'required|max:25',
            'RagioneSociale' => 'required|max:25',
            'image' => 'image|max:1024|mimes:jpeg,png,jpg'
        ];
    }

}