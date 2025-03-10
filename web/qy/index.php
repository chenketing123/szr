<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../../qy/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../../qy/config/main.php'),
    require(__DIR__ . '/../../qy/config/main-local.php')
);

$application = new yii\web\Application($config);
if(!isset(Yii::$app->session['language'])){
    Yii::$app->session['language']='zh-CN';
}
$application->language = isset(Yii::$app->session['language']) ? Yii::$app->session['language'] : 'zh-CN';
$application->run();
