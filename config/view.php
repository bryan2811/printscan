<?php

use function Roots\resource_path;
use function Roots\storage_path;

function has_child_views() {
    return get_template_directory() !== get_stylesheet_directory()
        && is_dir(get_stylesheet_directory().'/views');
}

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most template systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views.
    |
    | Note: Our child themes have a root in leadbox-genius-child/resources
    |       this requires adding a different view directory for child
    |       partials overriding.
    */

    'paths' => array_filter([
        has_child_views()
            ? get_stylesheet_directory().'/views'
            : false,
        get_parent_theme_file_path('/resources/views'),
        resource_path('views'),
    ]),

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the uploads
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => storage_path('framework/views'),

    /*
    |--------------------------------------------------------------------------
    | View Debugger
    |--------------------------------------------------------------------------
    |
    | Enabling this option will display the current view name and data. Giving
    | it a value of 'view' will only display view names. Giving it a value of
    | 'data' will only display current data. Giving it any other truthy value
    | will display both.
    |
    */

    'debug' => false,

    /*
    |--------------------------------------------------------------------------
    | View Namespaces
    |--------------------------------------------------------------------------
    |
    | Blade has an underutilized feature that allows developers to add
    | supplemental view paths that may contain conflictingly named views.
    | These paths are prefixed with a namespace to get around the conflicts.
    | A use case might be including views from within a plugin folder.
    |
    */

    'namespaces' => [
        /*
         | Given the below example, in your views use something like:
         |     @include('MyPlugin::some.view.or.partial.here')
         */
        // 'MyPlugin' => WP_PLUGIN_DIR . '/my-plugin/resources/views',
    ],

    /*
    |--------------------------------------------------------------------------
    | View Directives
    |--------------------------------------------------------------------------
    |
    | The namespaces where view components reside. Components can be referenced
    | with camelCase & dot notation.
    |
    */

    'directives' => [
        // 'ifFrench' => App\View\FooDirective::class,
        // 'foo'  => App\View\FooDirective::class,
    ],
];
