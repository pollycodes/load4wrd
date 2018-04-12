<?php

namespace PollyCodes\Load4wrd;

use Illuminate\Support\ServiceProvider;

class Load4wrdServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('pollycodes-load4wrd', function() {
          return new Load4wrd();
        });

        $this->app->make('PollyCodes\Load4wrd\Loading');
    }
}
