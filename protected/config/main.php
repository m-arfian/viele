<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('chartjs', dirname(__FILE__).'/../extensions/yii-chartjs');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Laundry',
    'theme' => 'metronic',
    'timeZone' => 'Asia/Jakarta',
    // preloading 'log' component
    'preload' => array('log', 'chartjs'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'laundry',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin'
    ),
    // application components
    'components' => array(
        'format' => array(
            'class' => 'MyFormatter'
        ),
        'user' => array(
            'class' => 'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
            ),
        ),
        'clientScript' => array(
            'scriptMap' => array(
                // map scripts from assets to your favourite versions (maybe CDN)
                'jquery.js' => 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
            ),
            'packages' => array(
                // here's a package named 'jquery'
                // it registers 3 JS and 2 css files, also note using scriptMap alias
                'jquery' => array(
                    'js' => array(
                        'jquery.js',
                    ),
                ),
            ),
        ),
        /*
          'db' => array(
          'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
          ),
         * 
         */
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=laundry',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'compaq',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
        'chartjs' => array('class' => 'chartjs.components.ChartJs'),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'tahun' => 2014,
        'bulan' => 8
    ),
);
