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
            'postOnly + update',
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'users' => array('@'),
            ),
            array(
                'deny',
                'users' => array('*'),
            ),
        );
    }


    public function actionIndex()
    {
        $model = UserRepository::findByPk();
        $transactions = TransactionRepository::findByUserId($model->id);
        $this->render(
            'index',
            [
                'model' => $model,
                'transactions' => $transactions
            ]
        );
    }

    public function actionUpdate()
    {
        $model = UserRepository::findByPk();
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save(true, ['name'])) {
                Yii::app()->user->setFlash('success', 'Имя пользователя успешно изменено');
            }
        }
        $this->redirect(['index']);
    }
}