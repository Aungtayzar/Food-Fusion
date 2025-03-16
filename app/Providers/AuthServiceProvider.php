<?php

namespace App\Providers;

use App\Models\ContactUs;
use App\Models\CulinaryResource;
use App\Models\Recipe;
use App\Policies\ContactPolicy;
use App\Policies\RecipePolicy;
use App\Policies\ResourcePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Recipe::class => RecipePolicy::class,
        CulinaryResource::class => ResourcePolicy::class,
        ContactUs::class => ContactPolicy::class,
    ];

    

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
