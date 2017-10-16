<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 16.10.17
 * Time: 12:05
 */
class TransactionService
{
    public static function create($amount)
    {
        $transaction=Yii::app()->db->beginTransaction();
        try
        {
            TransactionRepository::create($amount);
            UserRepository::takeMoney($amount);
            $transaction->commit();
        }
        catch(Exception $e) // в случае возникновения ошибки при выполнении одного из запросов выбрасывается исключение
        {
            $transaction->rollback();
            return false;
        }
        return true;
    }
}