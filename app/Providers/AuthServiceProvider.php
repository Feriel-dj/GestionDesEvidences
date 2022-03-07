<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', function(User $user){
            return $user->role_id == 'admin';
        });
        Gate::define('manage-demande', function(User $user){
            return $user->role_id == 'Enquêteur';
        });
        Gate::define('manage-consult', function(User $user){
            return $user->role_id == 'Avocat';
        });
    }
}
