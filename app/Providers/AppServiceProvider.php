<?php

namespace App\Providers;

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
        // Call to Entrust::getRole
          \Blade::directive('getRole', function($expression) {
              return "<?php if (\\Entrust::getRole({$expression})) : ?>";
          });

          \Blade::directive('endgetRole', function($expression) {
              return "<?php endif; // Entrust::getRole ?>";
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
