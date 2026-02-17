<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate as GateContract;
use Log;

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

        GateContract::before(function ($user, $ability) {
            Log::info("HAS ROLE ADMIN");
            Log::info($user);

            Log::info("HAS ROLE DEVLOPER");
            Log::info($user->hasRole('Super Admin'));
            return ($user->hasRole('Developer') || $user->hasRole('Developer')) ? true : null;
        });

        include_once (app_path(). '/Providers/role_permissions.php');

    }
}
