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
        $this->render('new');
    }

    public function actionCreate($email, $key)
    {
        
    }
}