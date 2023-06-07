<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Chat;
use App\Models\Task;
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

        Gate::define('store_message', function(User $user, Chat $chat) {
            return $user->hasChat($chat->id);
        });

        Gate::define('manage_subjects', function(User $user) {
            return ($user->role->name == "docent" || $user->role->name == "admin");
        });

        Gate::define('manage_tasks', function(User $user) {
            return ($user->role->name == "docent" || $user->role->name == "admin");
        });

        Gate::define('upload_task', function(User $user, Task $task) {
            return $user->hasTask($task->id) &&$user->role->name == "student";
        });

        Gate::define('see_points', function(User $user) {
            return $user->role->name == "student";
        });
    }
}
