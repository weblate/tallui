<?php

use Usetall\TalluiCore\Components;

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from tallui-core are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
    */

    'components' => [
        //'core-component' => Components\Blade\CoreComponent::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all the Livewire components that should be loaded
    | for your app. By default all components from tallui-core are loaded in.
    |
    */

    'livewire' => [
        //'core-livewire' => Components\Livewire\CoreLivewire::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all tallui-core components.
    | By default it's empty. This is useful if you want to avoid
    | collision with or otherwise overwrite core components.
    |
    | If set with "tui", for example, you can reference components like:
    |
    | <x-tui-alert />
    |
    */

    'prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Asset Libraries
    |--------------------------------------------------------------------------
    |
    | Components can require these asset files through their static `$assets`
    | property.
    |
    */

    'assets' => [

        // 'example' => [
        //     'https://unpkg.com/example/dist/example.min.css',
        //     'https://unpkg.com/example/dist/example.min.js',
        // ],

    ],

];
