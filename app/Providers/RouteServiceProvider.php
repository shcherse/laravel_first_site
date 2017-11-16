<?php

namespace App\Providers;

//use App\Article;
//use Illuminate\Routing\Router;
//use Route;
//use \Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
//use Symfony\Component\Routing\Router;

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
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        /** @noinspection PhpUndefinedNamespaceInspection */
        /** @noinspection PhpUndefinedClassInspection */
       // Route::model('article', 'App\Article');
        //$router->bind('article', function($id))
        //{
            //return \App\Aticle::published()->findOrFail($id);
        //});
        //$router->model('articles', 'App\Article');
        Route::bind('article', function($id)
        {
            return \App\Article::published()->findOrFail($id);
        });

        Route::bind('tag', function($name)
        {
            return \App\Tag::where('name', $name)->firstOrFail();
        });

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
}
