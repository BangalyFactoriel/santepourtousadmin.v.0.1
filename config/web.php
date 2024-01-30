<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'YATAGUI',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => $_SESSION['lang'],
    //'layout' => 'admin_layout',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [

        'mainClass' => [
            'class' => 'app\components\mainClass', //class pour les configurations
        ],

        'clientClass' => [
            'class' => 'app\components\clientClass', //class pour les produits
        ],

        'articleClass' => [
            'class' => 'app\components\articleClass', //class pour les produits
        ],

        'accessClass' => [
            'class' => 'app\components\accessClass', //class pour les produits
        ],

        'cryptoClass' => [
            'class' => 'app\components\cryptoClass', //class pour les cryptoClass
        ],

        'nonSqlClass' => [
            'class' => 'app\components\nonSqlClass', // CLass pour les fichiers
        ],

        'menuactionClass' => [
            'class' => 'app\components\menuactionClass',
        ],

        'utilisateurClass' => [
            'class' => 'app\components\utilisateurClass',
        ],

        'clientClass' => [
            'class' => 'app\components\clientClass', //class pour les configurations
        ],
        'notificationCLass' => [
            'class' => 'app\components\notificationCLass', //class pour les configurations
        ],


        'configClass' => [
            'class' => 'app\components\configClass', //class pour les configurations
        ],

        'fileuploadClass' => [
            'class' => 'app\components\fileuploadClass', //class pour les fichier
        ],


        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],




        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '&*()@A^)!(%^&*)@#$%^&*(*^%$_SDF$%^&%^',
        ],

        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'mailer' => [
        //     'class' => \yii\symfonymailer\Mailer::class,
        //     'viewPath' => '@app/mail',
        //     // send all mails to a file by default.
        //     'useFileTransport' => true,
        // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [


                // siteController
                md5('site_index') => 'site/index',
                '' => 'site/index',
                //productController
              
                md5('article_categories') => 'article/categories',
                md5('article_publicite') => 'article/publicite',
                md5('article_reference') => 'article/reference',
                md5('article_article') => 'article/article',
                md5('article_addarticle') => 'article/addarticle',
             
                //auteur
                md5('auteur_liste') => 'auteur/liste',

                //parametre
                md5('config_params') =>'config/params',
        
                //visiteurController
            
                md5('utilisateur_adduser') => 'utilisateur/adduser',
                md5('utilisateur_ajax')=>'utilisateur/ajax',
                md5('utilisateur_addgroupeuser')=>'utilisateur/addgroupeuser',
                md5('utilisateur_newuser').'/<code:\w+>'=>'utilisateur/newuser',
                /** DEFAULT RULES **/
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}
// die('ok');

return $config;
