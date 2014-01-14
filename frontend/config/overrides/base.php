<?php
/**
 * Base overrides for frontend application
 */
return [
    // So our relative path aliases will resolve against the `/frontend` subdirectory and not nonexistent `/protected`
    'basePath' => 'frontend',
    'import' => [
        'application.components.*',
        'application.controllers.*',
        'application.controllers.actions.*',
        'common.actions.*', 
    ],
    'controllerMap' => [
        // Overriding the controller ID so we have prettier URLs without meddling with URL rules
        'site' => 'SiteController'
    ],
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'20071984',
            'ipFilters'=>array('5.165.200.71'),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),
    ),
    'components' => [
        'errorHandler' => [
            // Installing our own error page.
            'errorAction' => 'site/error' 
        ],
        'urlManager' => [
            // Some sane usability rules
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',

                // Your other rules here...
            ]
        ],
    ],
];