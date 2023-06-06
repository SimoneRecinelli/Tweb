<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//use App\Models\User;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * array che specifica quali attributi possono essere assegnati in modo massivo
     *
     * @var array<int, string>
     */
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
     * Array che specifica gli attributi che devono essere nascosti nella serializzazione.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'username',
        'password',
        'remember_token',
    ];

    /**
     * Array che spcifica gli attributi che devono essere convertiti.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /** 
     * Metodo che prende un parametro $role 
     * e verifica se il ruolo dell'istanza corrente
     * corrisponde a uno o più ruoli specificati. 
     * 
     * Restituisce true se il ruolo corrisponde a uno dei ruoli specificati o false altrimenti
     */
    public function hasRole($role) {
        $role = (array)$role; //tramite casting converte il parametro $role in un array
        return in_array($this->role, $role); // funzione in_array per controllare se il ruolo dell'istanza corrente è presente nell'array dei ruoli specificati.
    }


    /**
     * Metodo che recupera i dati del profilo di un utente
     */
    public function getProfileData()
    {
        // Utilizza $this->id per ottenere l'ID dell'utente corrente
        $userId = $this->id;

        // Recupera i dati del profilo dell'utente dalla tabella 'users' utilizzando l'ID
        $profileData = User::find($userId);

        // Restituisci i dati del profilo
        return $profileData;
    }

    /**
     * Metodo utilizzato per estratte dati dal DB
     *  
     * Restituisce un elenco di tutti gli utenti con ruolo user
     *
     */
    public function getusers(){
        $users = $this->where('role','user')->get(); // where filtra user per il ruolo user
        return $users;
    }


}
