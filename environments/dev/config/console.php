<?php

$params = require __DIR__ . '/params.php';
$params_local = __DIR__ . '/params.local.php';
if(file_exists($params_local))
    $params = \yii\helpers\ArrayHelper::merge($params, require $params_local);

$db = require __DIR__ . '/db.php';
$db_local = __DIR__ . '/db.local.php';
if(file_exists($db_local))
    $db = \yii\helpers\ArrayHelper::merge($db, require $db_local);

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'wdmg\admin\Module',
        ],
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;