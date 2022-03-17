<?php

declare(strict_types=1);

namespace Joy\VoyagerBreadCampaign;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Joy\VoyagerBreadCampaign\Console\Commands\BreadCampaign;
use Joy\VoyagerBreadCampaign\Models\Campaign as ModelsCampaign;
use TCG\Voyager\Facades\Voyager;

/**
 * Class VoyagerBreadCampaignServiceProvider
 *
 * @category  Package
 * @package   JoyVoyagerBreadCampaign
 * @author    Ramakant Gangwar <gangwar.ramakant@gmail.com>
 * @copyright 2021 Copyright (c) Ramakant Gangwar (https://github.com/rxcod9)
 * @license   http://github.com/rxcod9/joy-voyager-bread-campaign/blob/main/LICENSE New BSD License
 * @link      https://github.com/rxcod9/joy-voyager-bread-campaign
 */
class VoyagerBreadCampaignServiceProvider extends ServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        Voyager::useModel('Campaign', ModelsCampaign::class);

        $this->registerPublishables();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'joy-voyager-bread-campaign');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'joy-voyager-bread-campaign');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix(config('joy-voyager-bread-campaign.route_prefix', 'api'))
            ->middleware('api')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/voyager-bread-campaign.php', 'joy-voyager-bread-campaign');

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
    }

    /**
     * Register publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__ . '/../config/voyager-bread-campaign.php' => config_path('joy-voyager-bread-campaign.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/joy-voyager-bread-campaign'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/joy-voyager-bread-campaign'),
        ], 'translations');
    }

    protected function registerCommands(): void
    {
        $this->app->singleton('command.joy.voyager.bread-campaign', function () {
            return new BreadCampaign();
        });

        $this->commands([
            'command.joy.voyager.bread-campaign',
        ]);
    }
}
