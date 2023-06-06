<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:3', 'regex:/^[\p{L}\s]+$/u'],
            'cognome' => ['required', 'string', 'min:3', 'regex:/^[\p{L}\s]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telefono' => ['required', 'string', 'min:10', 'regex:/^[+\s0-9]+$/i'],
            'genere' => ['required'],
            'eta' => ['required', 'integer', 'min:1', 'max:100'],
            'residenza' => ['required','string','regex:/^[\p{L}0-9\s.,\-]+$/u'],
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'genere' => $request->genere,
            'residenza' => $request->residenza,
            'telefono' => $request->telefono,
            'eta' => $request->eta
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
