<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Form;
use App\Models\User;
use App\Models\Offerta;
use App\Models\Coupon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;




class userController extends Controller {

    public function showHomeUser(){
        return view('RegisteredUserViews.homeuser'); //alternativa di can:isUser come definito nell'AdminController
    }

    public function showProfile()
    {
        // Recupera l'utente autenticato
        $user = Auth::user();

        // Ottieni i dati del profilo dell'utente
        $profileData = $user->getProfileData();

        $userCoupons = Coupon::getUserCoupons();

        // Fai qualcosa con i dati del profilo (ad esempio, passali alla vista)
        return view('RegisteredUserViews.profile', ['profileData' => $profileData], ['userCoupons' => $userCoupons]);


    }

    public function updateProfile(Request $request){
        // Recupera l'utente autenticato
        $user = Auth::user();

        //Validazione dei dati
         $validatedData = $request->validate([

            'nome' => ['required', 'string', 'min:3', 'regex:/^[a-zA-Z\s]+$/'],
            'cognome' => ['required','min:3', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'min:8'],
            'telefono' => ['required', 'numeric', 'min:10','max:10','regex:/^[0-9]+$/'],
            'genere' => ['required','string'],
            'eta' => ['required', 'integer', 'min:1', 'max:100'],
            'residenza' => ['required','string'],
        ]);

        // Aggiorna i dati del profilo dell'utente con i nuovi valori
        $user->nome =$validatedData['nome'];
        $user->cognome = $validatedData['cognome'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        //$user->password = Hash::make($validatedData['password']);
        $user->telefono = $validatedData['telefono'];
        $user->eta = $validatedData['eta'];
        $user->residenza = $validatedData['residenza'];
        $user->genere =($validatedData['genere']==0)?'Uomo':'Donna';


        $user->update();

        return redirect()->route('profile');

    }

    public function modificapassword(){
        return view('RegisteredUserViews.modificapassword');
    }

    public function putpassword(Request $request){
        // Recupera l'utente autenticato
        $user = Auth::user();

        //Validazione dei dati
         $validatedData = $request->validate([
            'password' => ['required',  Rules\Password::defaults()],
        ]);

        // Aggiorna i dati del profilo dell'utente con i nuovi valori
        
        $user->password = Hash::make($validatedData['password']);

        $user->update();

        return redirect()->route('profile');

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

    public function showUser() {
        $user = Auth::user();
        return view('RegisteredUserViews.modifyProfilo')->with('user',$user);
    }


    public function newcoupon($idOfferta){
        $user = Auth::user();
        $selOfferta=Offerta::where('idOfferta',$idOfferta)->first();
        $num=Coupon::where('id',$user->id)->where('idOfferta',$idOfferta)->count();
        
        
        if($num==0){
           $coupon = new Coupon;
        $coupon->Combinazione = 'prova';
        $coupon->id = Auth::user()->id;
         $coupon->idOfferta = $selOfferta->idOfferta;
         $coupon->codice = Str::random(10);
        $coupon->save();
        return view('RegisteredUserViews.newcoupon')->with('coupon',$coupon)->with('selOfferta',$selOfferta)->with('user',$user);
        }
        else{
            
            $errore='Puoi acquistare al massimo un coupon per ogni offerta';
            return view('UnregisteredUserViews.coupon')->with('selOfferta',$selOfferta)->with('errore',$errore);
        }
    }

}
