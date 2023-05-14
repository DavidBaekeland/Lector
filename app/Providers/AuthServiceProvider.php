<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Chat;
use App\Models\User;
use App\Policies\ChatPolicy;
use App\Policies\UserPolicy;
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
        User::class => UserPolicy::class,
        Chat::class => ChatPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('manage_users', function(User $user) {
            return $user->role->name == "admin";
        });

    }
}
