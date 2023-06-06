<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * In questa funzione utilizzando il metodo Gate::define() vengono definiti tre tipi di gate 
     * (isAdmin, isUser e isStaff) utilizzati per verificare il ruolo dell'utente
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies(); // Chiama il metodo registerPolicies() per registrare le politiche di autorizzazione predefinite dell'applicazione

        //La funzione accetta due parametri: il nome del gate e una funzione di callback che determina se l'utente ha l'autorizzazione richiesta.
        Gate::define('isAdmin', function ($user) { 
            return $user->hasRole('admin');
            /**
             * All'interno della funzione, viene chiamato il metodo hasRole() sull'oggetto $user, 
             * che controlla se l'utente ha come ruolo "admin". 
             * se si la funzione restituisce TRUE, indicando che l'utente ha l'autorizzazione richiesta 
             */
        });

        Gate::define('isUser', function ($user) {
            return $user->hasRole('user');
        });

        Gate::define('isStaff', function ($user) {
            return $user->hasRole('staff');
        });

    }
}
