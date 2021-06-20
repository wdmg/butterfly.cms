<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'butterfly-cms-console',
    'version' => '1.1.3',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
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
            'assignmentTable' => '{{%rbac_assignments}}',
            'itemChildTable' => '{{%rbac_childs}}',
            'itemTable' => '{{%rbac_roles}}',
            'ruleTable' => '{{%rbac_rules}}',
        ],
        'urlManager' => [
            'hostInfo' => 'example.com',
            'baseUrl' => 'http://example.com/',
            'scriptUrl' => 'http://example.com/index.php',
            'enablePrettyUrl' => true,
            'showScriptName' => false
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
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
