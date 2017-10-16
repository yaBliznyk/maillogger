<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 15:12
 */
class ProfileController extends Controller
{
    public function filters()
    {
        return array(
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


    public function actionIndex()
    {
        $model = UserRepository::findByPk();
        $this->render('index', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        if (Yii::app()->request->isPostRequest)
        $this->redirect(['index']);
    }
}