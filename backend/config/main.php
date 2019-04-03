<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

use \yii\web\Request;
$baseUrl = str_replace('/web', '', (new Request)->getBaseUrl());

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'user' => [
            'class' => 'amnah\yii2\user\Module',
                'controllerMap' => [
                'admin' => 'backend\controllers\AdminController',
            ],
            'modelClasses'  => [
                'User' => 'common\models\User', // note: don't forget component user::identityClass above
                'Profile' => 'common\models\Profile',
            ],
           // 'emailViewPath' => '@app/mail/user', 
        ],
    ],
    'components' => [
        'request' => [
            'baseUrl' => $baseUrl,
            'csrfParam' => '_csrf-backend',
        ],
       /*'view' => [
            'theme' => [
                'pathMap' => [
                    '@vendor/amnah/yii2-user/views' => '@backend/views/user', // example: @app/views/user/default/login.php
                ], 
            ],
        ], */
        'user' => [
            'class' => 'amnah\yii2\user\components\User',
        ],
       /* 'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],*/
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
             'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host'     => 'smtp.gmail.com',
                'username'   => 'ravi.netqom@gmail.com', 
                'password'   => 'ravi@123',
                'port'     => '587',
                'encryption' => 'tls',
            ],
            'messageConfig' => [
                'from' => ['admin@gmail.com' => 'Admin'], // this is needed for sending emails
                'charset' => 'UTF-8',
            ]
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
