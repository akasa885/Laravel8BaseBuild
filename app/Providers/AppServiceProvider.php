<?php

namespace App\Providers;

use App\Helpers\UrlAccessLocalCheck;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // check if current url is local or not
        UrlAccessLocalCheck::isLocal();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Relation::enforceMorphMap([
        //     'MorphUser' => 'App\Models\User',
        // ]);
    }
}
