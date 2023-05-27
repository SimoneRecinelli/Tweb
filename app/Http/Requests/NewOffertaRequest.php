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
    public function rules()
    {
        /* l'espressione regolare /^[a-zA-Z\s]+$/ permette solo lettere
        (sia maiuscole che minuscole) e spazi nei campi specificati. */

        return [
            'DescrizioneOfferta' => 'required|min:10|max:2500',
            'Categoria' => 'required|max:30|regex:/^[a-zA-Z\s]+$/',
            'Scadenza' => 'required',
            'Oggetto' => 'required|min:2|max:30|',
            'NomeAzienda' => 'required|max:30',
            'Prezzo' => 'required|numeric|min:0',
            'PercentualeSconto' => 'required|numeric|min:0|max:100',
            'Luogo' => 'required|max:30|regex:/^[a-zA-Z\s]+$/',
            'Modalità' => 'required|max:30|regex:/^[a-zA-Z\s]+$/',
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