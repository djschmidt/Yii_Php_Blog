    <?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Blog',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
//                'application.modules.user.models.*',
//                'application.modules.user.components.*',
        'application.extension.yiichat.*',
        'ext.yii-mail.YiiMailMessage',
    ),
    'defaultController' => 'post',
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'default1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array($_SERVER['REMOTE_ADDR']),
//            'ipFilters' => array('*'),
        ),
    // application components
    ),
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin' => true,
            'loginUrl' => ('/user/login'),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=dps;',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'email' => array(
            'class' => 'application.extensions.email.Email',
            'delivery' => 'php', 
        ),
        /* 'db'=>array(
          'connectionString' => 'sqlite:protected/data/blog.db',
          'tablePrefix' => 'tbl_',
          ),
         */
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        /* 'urlManager' => array(
          'urlFormat' => 'path',
          'rules' => array(
          //'gii' => 'gii',
          //'gii/<controller:\w+>' => 'gii/<controller>',
          //'gii/ <controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
          'post/<id:\d+>/<title:.*?>' => 'post/view',
          'posts/<tag:.*?>' => 'post/index',
          '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
          ),
          ),
         */
        /* 'user'=>array(

          'sendActivationMail' => true,
          'isAdmin' =>true,
          'loginNotActiv' => false,
          'autoLogin' => true,
          'registrationUrl' => array('/user/registration'),
          'recoveryUrl'=> array('/user/recovery'),
          'loginUrl' => array('/user/profile'),
          'returnLogoutUrl' => array('/user/login'),
          )
         */
        'login' => array(
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
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => require(dirname(__FILE__) . '/params.php'),
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
