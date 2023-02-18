<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Account;
use App\Models\Post;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function (Account $account, Post $post) {
            return $account->id === $post->account_id;
        });
        Gate::define('delete-post', function (Account $account, Post $post) {
            return $account->id === $post->account_id;
        });
        Gate::define('create-post', function () {
            return auth()->user()->role === 'admin';
        });
    }
}