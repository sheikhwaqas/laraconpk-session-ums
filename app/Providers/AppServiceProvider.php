<?php

namespace App\Providers;

use App\Role;
use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Role::creating(function($role) {
            return $role->slug = Str::slug($role->label);
        });

        Permission::creating(function($permission) {
            return $permission->slug = Str::slug($permission->label);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
