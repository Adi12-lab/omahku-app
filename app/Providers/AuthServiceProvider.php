<?php

namespace App\Providers;

use App\Models\Property;
use App\Models\Wishlist;
use App\Policies\WishlistPolicy;
use App\Policies\PropertyPolicy;
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
        Wishlist::class => WishlistPolicy::class,
        Property::class => PropertyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
  
    }
}
