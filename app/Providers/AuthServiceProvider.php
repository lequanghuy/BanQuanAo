<?php

namespace App\Providers;

use App\Admin;
use Illuminate\Support\Facades\Gate;
use App\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('boss', function(){
//           return $admin->job_title == 'boss';
//        });

        if(! $this->app->runningInConsole())
        {
            foreach (Permission::all() as $permission){
                Gate::define($permission->name, function ($user) use ($permission){
                   return  $user->hasPermission($permission);
                });
            }
        }
    }
}
