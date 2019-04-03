<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',
                'controllerMap' => [
                'default' => 'frontend\controllers\MyDefaultController',
            ],
            'modelClasses'  => [
                'User' => 'common\models\User', // note: don't forget component user::identityClass above
                'Profile' => 'common\models\Profile',
                'Role' => 'common\models\Role',
            ],
           // 'emailViewPath' => '@app/mail/user', 
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],*/
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            //'siteKey' => '6LcEyYIUAAAAAFx1fTlvGEf-tFxqXaGRZy0oFuYz',
            //'secret' => '6LcEyYIUAAAAADceig3-O7Ptx1SMhBhDskM2TloB',
            // on localhost
            'siteKey' => '6Lfl1JsUAAAAALBJG1ztW2-M0hpjJQzp2hwZZHqx',
            'secret' => '6Lfl1JsUAAAAAFJ0_9HB_9olyHM38edpjCc6fPa0',
        ],
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@vendor/amnah/yii2-user/views' => '@frontend/views/user', // example: @app/views/user/default/login.php
                ], 
            ],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
       'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
           // 'rules' => []
        ]
    ],
    'params' => $params,
];
