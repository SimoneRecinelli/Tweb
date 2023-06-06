<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewFaqRequest extends FormRequest
{
    /**
     * Determina se l'user è autorizzato a fare questa richiesta
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Definiamo le regole di validazione da applicare 
     * nelle funzioni "storefaq" e "modifyfaq" nell'AdminController
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'Domanda' => 'required|string',
            'Risposta' => 'required|string'
        ];
    }
}
