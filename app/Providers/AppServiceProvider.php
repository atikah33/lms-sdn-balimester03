<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Materi;
use App\Models\User;
use App\Policies\MateriPolicy;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register policies
        Gate::policy(Materi::class, MateriPolicy::class);
        Gate::policy(User::class, UserPolicy::class);

        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('manage-materi', function (User $user) {
            return $user->isGuru() || $user->isAdmin();
        });

        Gate::define('view-absensi', function (User $user) {
            return $user->isGuru() || $user->isAdmin();
        });
    }
}
