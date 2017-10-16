<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 16.10.17
 * Time: 10:53
 */
class ApiController extends Controller
{
    public function filters()
    {
        return array(
            ['application.components.ApiLoginFilter'],
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    protected function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);

        foreach (Yii::app()->log->routes as $route) {
            if($route instanceof CWebLogRoute) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
        Yii::app()->end();
    }
}