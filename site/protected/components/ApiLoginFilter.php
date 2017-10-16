<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 16.10.17
 * Time: 11:13
 */

class ApiLoginFilter extends CFilter
{
    protected function preFilter($filterChain)
    {
        if (!isset($_GET['api_key'])) {
            return false;
        }
        $user = UserRepository::findByApiKey($_GET['api_key']);
        if (!$user) {
            return false;
        }
        $identity = new UserIdentity($user->email, '');
        $identity->authenticate();
        return Yii::app()->user->login($identity);
    }
}