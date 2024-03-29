<?php

/**
 * Configuration parameters common to all entry points.
 */
return [
    'preload' => ['log', 'bootstrap'],
    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../../lib/vendor/2amigos/yiistrap'), // change this if necessary
        'yiiwheels' => realpath(__DIR__ . '/../../lib/vendor/2amigos/yiiwheels'),
        'image' => realpath(__DIR__ . '/../../extensions/image'),
    ),
    'import' => [
        'common.components.*',
        'common.models.*',
        // The following two imports are polymorphic and will resolve against wherever the `basePath` is pointing to.
        // We have components and models in all entry points anyway
        'application.components.*',
        'application.helpers.*',
        'application.models.*',
        'bootstrap.helpers.TbHtml',
        'common.helpers.*',
    ],
    'components' => [
        'image' => array(
            'class' => 'image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'ImageMagick',
            // ImageMagick setup path
            //'params' => array('directory' => '/usr/bin'),
        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        //'db' => [
        //    'schemaCachingDuration' => PRODUCTION_MODE ? 86400000 : 0, // 86400000 == 60*60*24*1000 seconds == 1000 days
        //    'enableParamLogging' => !PRODUCTION_MODE,
        //    'charset' => 'utf8'
        //],
        'db' => [
            'connectionString' => 'mysql:host=localhost;dbname=pp',
            'username' => 'pp',
            'password' => '842655',
            'enableProfiling' => true,
            'enableParamLogging' => true,
            'charset' => 'utf8',
        ],
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'urlSuffix' => '/',
        ],
        'cache' => extension_loaded('apc') ? [
            'class' => 'CApcCache',
                ] : [
            'class' => 'CDbCache',
            'connectionID' => 'db',
            'autoCreateCacheTable' => true,
            'cacheTableName' => 'cache',
                ],
        'messages' => [
            'basePath' => 'common.messages'
        ],
        'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                'logFile' => [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                    'filter' => 'CLogFilter'
                ],
            ]
        ],
    ]
];