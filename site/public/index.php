<?php

// change the following paths if necessary
require dirname(__FILE__) . '/../protected/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(dirname(__FILE__) . '/../protected/');
$dotenv->load();

require(dirname(__FILE__) . '/../framework/YiiBase.php');

class Yii extends YiiBase
{
    /**
     * @static
     * @return CWebApplication
     */
    public static function app()
    {
        return parent::app();
    }
}

$yii = dirname(__FILE__) . '/../framework/yii.php';
$config = dirname(__FILE__) . '/../protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG'));
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', getenv('YII_TRACE_LEVEL'));

Yii::createWebApplication($config)->run();
