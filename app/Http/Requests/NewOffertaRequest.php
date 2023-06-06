<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class NewOffertaRequest extends FormRequest {

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
     * nelle funzioni "storeofferta" e "modifyofferta" nello StaffController
     *
     * @return array
     */
    public function rules()
    {
          

        return [

            /* L'espressione "regex:/^[\p{L}\s]+$/u" permette di scrivere stringhe
            contenenti solo lettere e spazi e può essere lunga da uno a più caratteri */

            'DescrizioneOfferta' => 'required|min:10',
            'Categoria' => 'required|max:30|regex:/^[\p{L}\s]+$/u',
            'Scadenza' => 'required',
            'Oggetto' => 'required|min:2|max:30',
            'NomeAzienda' => 'required|max:30',
            'Prezzo' => 'required|numeric|min:0.01',
            'PercentualeSconto' => 'required|numeric|min:0|max:100',
            'Luogo' => 'required|max:30|regex:/^[\p{L}\s]+$/u',
            'Modalità' => 'required|max:30|regex:/^[\p{L}\s]+$/u',
            'Evidenza' => 'required',
            'image' => 'file|mimes:jpeg,png,jpg'
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