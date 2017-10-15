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
        $user = User::model()->findByAttributes(['email' => $email]);
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
}