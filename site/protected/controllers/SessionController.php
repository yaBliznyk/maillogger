<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 15:10
 */
class SessionController extends Controller
{
    public function actionNew()
    {
        $model = new LoginForm();
        $this->render('new', ['model' => $model]);
    }

    public function actionCreate($email, $key)
    {

    }
}