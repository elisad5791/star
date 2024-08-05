<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();

        Permission::all()->map(function ($permission) {
            Gate::define($permission->title, function ($user) use ($permission) {
                return $user->hasPermissionFinally($permission->title);
            });
        });
    }
}
