<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user, $permission) {

            if ($user->permissions->isNotEmpty()) {

                foreach ($user->permissions as $permissions) {
                    $userPermission[] = $permissions->name;
                }

                if ($user->role->name == "desenvolvedor" || in_array($permission, $userPermission)) {
                    return true;
                } else {
                    return false;
                }
            }
        });
    }
}
