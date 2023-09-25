<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        //
    }

    protected function mapWebRoutes()
    {
        Route::prefix(app()->getLocale())
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
            Route::prefix( app()->getLocale() .'/api')
            // Route::prefix( app()->getLocale() /'/api')
            ->middleware('api')
            ->as('api.')
            ->namespace($this->namespace."\\API")
            ->group(base_path('routes/api.php'));

            // $this->routes( function () {
                // $langs  = array_keys( config('langs') );
                // $locale = request()->segment(1);
                // App::setLocale( in_array( $locale , $langs ) ? $locale : 'en' );

                // Route::prefix(  app()->getLocale().'/api')
                // Route::prefix( '{local}/api' )
                //     ->middleware('api')
                //     ->as('api.')
                    // ->namespace( $this->app->getNamespace() .' "\\API" ' )
                    // ->namespace($this->namespace."\\API")
                    // ->group( base_path('routes/api.php') );
            // });

    }
}
