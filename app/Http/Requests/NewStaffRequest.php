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
            'nome' => 'required|max:25',
            'cognome' => 'required|max:30',
            'email' => 'required|max:30',
            'eta' => 'required|max:25',
            'telefono' => 'required|min:10|max:10',
            'residenza' => 'required|max:25',
            'username' => 'required|max:25',
            'password' => 'required|max:25',
            'genere' => 'required|max:25',
            //'ruolo' => ['required', Rule::in(['staff'])], // Aggiungi la regola per verificare che il campo "ruolo" sia "staff"
        ];
    }

}