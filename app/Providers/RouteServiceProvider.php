<?php

namespace Swedigo\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Swedigo\Http\Controllers';

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

       $this->mapModuleRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }


    // Load All Module routes
    protected function mapModuleRoutes()
    {
        $path = base_path('modules/');
        $pattern = '*'; // All files
        $dirs = glob($path.$pattern);




        foreach ($dirs as $key => $fullpath) {
            list($baseDir, $moduleName) = explode($path, $fullpath);

            $routes_path = $fullpath.'/Api/routes.php';

            $versionDirs = glob($fullpath.'/Api/'.$pattern);

            foreach ($versionDirs as $versionPath) {

                $routePath = $versionPath.'/routes.php';

                if(file_exists($routePath))
                    Route::prefix('api')
                        ->middleware('api')
                        ->group($routePath);
            }

        }
    }
}
