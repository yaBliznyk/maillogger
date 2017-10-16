<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 16.10.17
 * Time: 11:36
 */
class TransactionRepository
{
    /**
     * @return Transaction
     */
    public static function find()
    {
        return Transaction::model();
    }

    public static function create($amount)
    {
        $transaction = new Transaction();
        $transaction->user_id = Yii::app()->user->id;
        $transaction->amount = $amount;
        if (!$transaction->save()) {
            throw new CDbException('Ошибка создания транзакции');
        }
        return $transaction;
    }

    /**
     * @param $id
     * @return Transaction[]
     */
    public static function findByUserId($id)
    {
        return self::find()->findAllByAttributes(['user_id' => $id]);
    }
}