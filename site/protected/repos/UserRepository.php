<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 21:24
 */
class UserRepository
{
    /**
     * @return User
     */
    public static function find()
    {
        return User::model();
    }

    /**
     * @param string $email
     * @return User
     * @throws CDbException
     */
    public static function createIfNotExists($email)
    {
        $user = self::find()->findByAttributes(['email' => $email]);
        if (!$user) {
            $user = new User();
            $user->name = 'New user';
            $user->email = $email;
            $user->generateUniqueKey();
            if (!$user->save()) {
                throw new CDbException('Ошибка создания пользователя');
            }
        }
        return $user;
    }

    /**
     * @param $api_key
     * @return User
     */
    public static function findByApiKey($api_key)
    {
        return self::find()->findByAttributes(['api_key' => $api_key]);
    }

    /**
     * @param null $id
     * @return User
     */
    public static function findByPk($id = null)
    {
        return self::find()->findByPk($id ? $id : Yii::app()->user->id);
    }
}