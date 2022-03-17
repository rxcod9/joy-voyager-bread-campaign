<?php

return [

    /*
     * If enabled for voyager-bread-campaign package.
     */
    'enabled' => env('VOYAGER_BREAD_CAMPAIGN_ENABLED', true),

    /*
     * The config_key for voyager-bread-campaign package.
     */
    'config_key' => env('VOYAGER_BREAD_CAMPAIGN_CONFIG_KEY', 'joy-voyager-bread-campaign'),

    /*
     * The route_prefix for voyager-bread-campaign package.
     */
    'route_prefix' => env('VOYAGER_BREAD_CAMPAIGN_ROUTE_PREFIX', 'joy-voyager-bread-campaign'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerBreadCampaign\\Http\\Controllers',
    ],
];
