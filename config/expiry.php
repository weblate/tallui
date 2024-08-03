<?php

/*
|--------------------------------------------------------------------------
| Moox Configuration
|--------------------------------------------------------------------------
|
| This configuration file uses translatable strings. If you want to
| translate the strings, you can do so in the language files
| published from moox_core. Example:
|
| 'trans//core::common.all',
| loads from common.php
| outputs 'All'
|
*/

return [

    /*
    |--------------------------------------------------------------------------
    | Navigation Sort
    |--------------------------------------------------------------------------
    |
    | This value is the sort order of the navigation item in the
    | Filament Admin Panel. If you use a bunch of Moox
    | plugins, everything should be in order.
    |
    */

    'navigation_sort' => 7001,

    /*
    |--------------------------------------------------------------------------
    | Tabs
    |--------------------------------------------------------------------------
    |
    | Define the tabs for the Expiry table. They are optional, but
    | pretty awesome to filter the table by certain values.
    | You may simply do a 'tabs' => [], to disable them.
    |
    */

    'tabs' => [
        'all' => [
            'label' => 'trans//core::common.all',
            'field' => 'expiry_job',
            'value' => '',
            'icon' => 'gmdi-filter-list',
        ],
        'documents' => [
            'label' => 'trans//core::common.documents',
            'field' => 'expiry_job',
            'value' => 'Documents',
            'icon' => 'gmdi-text-snippet',
        ],
        'articles' => [
            'label' => 'trans//core::common.articles',
            'field' => 'expiry_job',
            'value' => 'Articles',
            'icon' => 'gmdi-account-circle',
        ],
        'tasks' => [
            'label' => 'trans//core::common.tasks',
            'field' => 'expiry_job',
            'value' => 'Tasks',
            'icon' => 'gmdi-no-accounts',
        ],
        'no-user' => [
            'label' => 'trans//core::expiry.no_assignee',
            'field' => 'status',
            'value' => 'No Assignee',
            'icon' => 'gmdi-no-accounts',
        ],
        'no-date' => [
            'label' => 'trans//core::expiry.no_expiry_date',
            'field' => 'status',
            'value' => 'No Expiry Date',
            'icon' => 'gmdi-no-accounts',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Url Patterns
    |--------------------------------------------------------------------------
    |
    | Define the url patterns for the Expiry table. They are optional, but
    | pretty awesome to point to individual urls. Below are examples.
    | Don't forget to enable the feature, if you want to use it.
    |
    */

    'url_patterns' => [
        'enabled' => false,
        'patterns' => [
            'Documents' => '/#documents',
            'Articles' => '/#articles',
            'Tasks' => '/#tasks',
            'default' => '',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Model and default user to notify
    |--------------------------------------------------------------------------
    |
    | Bring your own user model, or use the default one
    | and set the default user to notify.
    |
    */

    'user_model' => \Moox\Press\Models\WpUser::class,
    'default_notified_to' => 1,

    /*
    |--------------------------------------------------------------------------
    | Disable actions
    |--------------------------------------------------------------------------
    |
    | You can disable some action buttons in the admin panel.
    | These actions are still available via the API
    | or by using the included jobs.
    |
    */

    'create_expiry_action' => false,
    'collect_expiries_action' => true,
    'send_summary_action' => true,

    /*
    |--------------------------------------------------------------------------
    | Jobs
    |--------------------------------------------------------------------------
    |
    | These jobs are used to collect expiries and send summaries.
    |
    */

    'collect_expiries_jobs' => [
        \Moox\Expiry\Jobs\CollectExpiries::class,
        // Add more jobs here if needed.
    ],
    'send_summary_job' => \Moox\Expiry\Jobs\SendSummary::class,

    /*
    |--------------------------------------------------------------------------
    | API
    |--------------------------------------------------------------------------
    |
    | Enable or disable the API.
    |
    */

    'api' => true,
];
