<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewStaffRequest extends FormRequest {

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
            'nome' => 'required|string|min:3|regex:/^[a-zA-Z\s]+$/',
            'cognome' => 'required|string|min:3|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|max:255',
            'eta' => 'required|integer|min:1|max:100',
            'telefono' => 'required|string|min:10|regex:/^[0-9]+$/',
            'residenza' => 'required|min:3',
            'username' => 'required|string|min:8',
            'password' => 'required|min:8',
            'genere' => 'required|string',
        ];
    }

}