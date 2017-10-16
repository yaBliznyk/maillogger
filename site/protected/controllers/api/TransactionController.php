<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 16.10.17
 * Time: 10:51
 */
class TransactionController extends ApiController
{
    public function actionCreate()
    {
        if (!isset($_POST['amount'])) {
            $this->renderJSON([
                'status' => 501,
                'message' => 'need POST["amount"]'
            ]);
            Yii::app()->end();
        }
        if (TransactionService::create((int)$_POST['amount'])) {
            $this->renderJSON([
                'status' => 200,
                'message' => 'success',
            ]);
            Yii::app()->end();
        }
        $this->renderJSON([
            'status' => 501,
            'message' => 'transaction not created',
        ]);
        Yii::app()->end();
    }
}