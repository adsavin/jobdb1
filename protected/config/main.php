<?php

$mysql_user = 'root';
$mysql_password = '123';
$mysql_database = 'job_engine_db';
$mysql_host = '127.0.0.1';

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
//Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/booster');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
Yii::setPathOfAlias('theme', dirname(__FILE__) . '/../../themes/hebo');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => Yii::t('app', 'Job Engine'),
    // preloading 'log' component
    'preload' => array(
        'log',
        'bootstrap', // preload the bootstrap component
        'translate'
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.components.actions.*',
        'application.extensions.*',
        'application.extensions.yii-pdf',
        'application.extensions.helpers.*',
//        'application.extensions.booster.*',
        'application.extensions.bootstrap.*',
        'application.extensions.ckeditor.*',
        'application.extensions.fckeditor.*',
        'application.modules.srbac.models.*',
        'application.modules.srbac.controllers.SBaseController',
        'ext.AweCrud.components.*', // AweCrud components
        'application.modules.translate.TranslateModule',
        'application.extensions.yiichat.*',
    ),
    'theme' => 'hebo',
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'application.gii.generators',
                'bootstrap.gii',
                'ext.AweCrud.generators', // AweCrud generators
            ),
        ),
        'srbac' => array(
            'userclass' => 'User', //default: User 
            'userid' => 'id', //default: userid 
            'username' => 'username', //default:username 
            'delimeter' => '@', //default:- 
//            'debug' => true, //default :false 
            'debug' => false, //default :false 
            'pageSize' => 10, // default : 15 
            'superUser' => 'Administrator', //default: Authorizer 
//            'css' => 'srbac.css', //default: srbac.css 
            'layout' => 'application.views.layouts.main', //default: application.views.layouts.main,
            'notAuthorizedView' => 'srbac.views.authitem.unauthorized', // default: srbac.views.authitem.unauthorized, must be an existing alias 
            'alwaysAllowed' => array(),
            'userActions' => array('Show', 'View', 'List'), //default: array() 
            'listBoxNumberOfLines' => 10, //default : 10 
            'imagesPath' => 'srbac.images', // default: srbac.images 
            'imagesPack' => 'tango', //default: noia, tango
            'iconText' => true, // default : false 
            'header' => 'srbac.views.authitem.header',
            'footer' => 'srbac.views.authitem.footer',
            'showHeader' => false, // default: false 
            'showFooter' => false, // default: false 
            'alwaysAllowedPath' => 'srbac.components',
        ),
        "translate",
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */
        /*
          'db' => array(
          'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/testdrive.db',
          ),

         * */

        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => "mysql:host=$mysql_host;dbname=$mysql_database",
            'emulatePrepare' => true,
            'username' => "$mysql_user",
            'password' => "$mysql_password",
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
        //For resize Image
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            'driver' => 'GD',
        //'params' => array('directory' => '/opt/local/bin'),
        ),
        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            //'class' => 'booster.components.Booster',
            'responsiveCss' => true,
        ),
        'authManager' => array(
            'class' => 'application.modules.srbac.components.SDbAuthManager',
            'connectionID' => 'db',
            'itemTable' => 'items',
            'assignmentTable' => 'assignments',
            'itemChildTable' => 'itemchildren',
        ),
        //define the class and its missing Translation event
        'messages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('TranslateModule', 'missingTranslation'),
            'translatedMessageTable' => 'message',
            'sourceMessageTable' => 'message_source',
        ),
        'translate' => array(//ifyounameyourcomponentsomethingelsechangeTranslateModule
            'class' => 'translate.components.MPTranslate',
            //anyavaliableoptionshere
            'acceptedLanguages' => array(
                'en' => 'English',
                'lo' => 'ພາສາລາວ'
            ),
        ),
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'application.vendor.mpdf.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                    'defaultParams' => array(// More info: http://mpdf1.com/manual/index.php?tid=184
                        'mode' => '', //  This parameter specifies the mode of the new document.
                        'format' => 'A4', // format A4, A5, ...
                        'default_font_size' => "12", // Sets the default document font size in points (pt)
                        'default_font' => 'saysettha_web', // Sets the default font-family for the new document.
                        'mgl' => 10, // margin_left. Sets the page margins for the new document.
                        'mgr' => 8, // margin_right
                        'mgt' => 4, // margin_top
                        'mgb' => 4, // margin_bottom
//                        'mgh' => 9, // margin_header
//                        'mgf' => 9, // margin_footer
                        'orientation' => 'P', // landscape or portrait orientation
                    )
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'saveCompleted' => "Operation Successful...",
        'cannotSave' => 'Can not Save Data...',
        'fixThingsUp' => '<strong>Error</strong>Fix things up and submit again',
        "cvAttacheDir" => "uploads/cv/attached_files/",
        "cvProfileDir" => "uploads/cv/profile/",
    ),
    'language' => 'en'
);
