<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Form;
use App\Models\User;
use Illuminate\Validation\Rules;





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

        //Validazione dei dati
         $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cognome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string'],
            'telefono' => ['required', 'string', 'min:10'],
            'genere' => ['required','string'],
            'eta' => ['required', 'integer', 'min:1', 'max:100'],
            'residenza' => ['required','string'],
        ]);

        // Aggiorna i dati del profilo dell'utente con i nuovi valori
        $user->nome =$validatedData['nome'];
        $user->cognome = $validatedData['cognome'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->password = $validatedData['password'];
        $user->telefono = $validatedData['telefono'];
        $user->eta = $validatedData['eta'];
        $user->residenza = $validatedData['residenza'];
        $user->genere =($validatedData['genere']==0)?'Uomo':'Donna';
        // Aggiorna gli altri campi del profilo dell'utente
        // ...


        // Salva le modifiche
        //$user->save();
        $user->update();

        return redirect()->route('profile')->withErrors(['success' => 'Il profilo è stato aggiornato con successo.']);
        //Aggiorna il profilo dell'utente con i nuovi dati
        //$user->updateProfile($validatedData);

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

    public function showForm() {
        return view('modifyProfilo');
    }

    public function showUser() {
        $user = Auth::user();
        /*$id=Auth::user()->id;
        $user = User::where('id',$id);
        dd($user->nome);*/
        return view('modifyProfilo')->with('user',$user);
    }

}
