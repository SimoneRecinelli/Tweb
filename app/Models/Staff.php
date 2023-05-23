<?php

namespace App\Models;

use App\Models\Resources\Category;
use App\Models\Resources\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Staff extends Model {

    protected $table = 'users';

    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'username',
        'password',
        'possibilità_abbinamento',
        'eta',
        'genere',
        'residenza',
        'telefono',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'username',
        'password',
    ];


   /* public function getProfileData()
    {
        // Utilizza $this->id per ottenere l'ID dell'utente corrente
        $userId = $this->id;

        // Recupera i dati del profilo dell'utente dalla tabella 'users' utilizzando l'ID
        $profileData = User::find($userId);

        // Restituisci i dati del profilo
        return $profileData;
    } */

    

}