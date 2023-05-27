<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class NewOffertaRequest extends FormRequest {

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
            'DescrizioneOfferta' => 'required|max:2500',
            'Categoria' => 'required|max:30',
            'Scadenza' => 'required',
            'Oggetto' => 'required|max:30',
            'NomeAzienda' => 'required|max:30',
            'Prezzo' => 'required|min:0',
            'PercentualeSconto' => 'required|integer|min:0|max:100',
            'Luogo' => 'required|max:30',
            'Modalità' => 'required|max:30',
            'Evidenza' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg|max:1024'
        ];

    }
    /**
     * Override: response in formato JSON
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}