<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class userController extends Controller {

    public function showHomeUser(){
        return view('homeuser'); //alternativa di can:isUser come definito nell'AdminController
    }

    public function showProfile()
    {
        // Recupera l'utente autenticato
        $user = Auth::user();

        // Ottieni i dati del profilo dell'utente
        $profileData = $user->getProfileData();

        // Fai qualcosa con i dati del profilo (ad esempio, passali alla vista)
        return view('profile', ['profileData' => $profileData]);
    }

    public function updateProfile(Request $request){
        // Recupera l'utente autenticato
        $user = Auth::user();

        // Validazione dei dati
        $validatedData = $request->validate([
            'nome' => 'required|string',
            'cognome' => 'required|string',
            'email' => 'required|email',
            'eta' => 'required|integer|min:1|max:100',
            'genere' => 'required|string',
            'residenza' => 'required|string',
            'telefono' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|confirmed|Rules\Password::defaults()'
        ]);

        // Aggiorna il profilo dell'utente con i nuovi dati
        $user->updateProfile($validatedData);

    }

    public function deleteProfile()
    {
        // Recupera l'utente autenticato
        $user = Auth::user();

        // Verifica se l'utente è autenticato
        if ($user) {
            // Eliminazione del profilo
            $user->delete();
            return redirect()->route('login');
        }
    }

}
