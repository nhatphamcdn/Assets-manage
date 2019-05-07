<?php

namespace Nhatphamcdn\AssetsManage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AssetsManageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();

        Blade::directive('css', function ($expression) {
            return "<?php echo app('assets-manage')->asset('css', $expression) ?>";
        });

        Blade::directive('js', function ($expression) {
            return "<?php echo app('assets-manage')->asset('js', $expression) ?>";
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('assets-manage', function() {
            $assets = $this->app['config']->get('assets-manage.assets');
            return new AssetManage($assets);
        });
    }

    private function publishConfig() {
        $configPath = __DIR__.'/../config/assets.php';
        
        $this->publishes([
            $configPath => config_path('assets-manage.php')
        ], 'config');

        $this->mergeConfigFrom($configPath, 'assets-manage');
    }
}
