<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class TransactionForm extends CFormModel
{
    public $amount;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('amount', 'required'),
            array('amount', 'numerical', 'min' => 1),
            array('amount', 'validateExists'),

        );
    }

    public function validateExists($attribute, $value)
    {
        $user = UserRepository::findByPk(Yii::app()->user->id);
        if ($value > $user->money) {
            $this->addError($attribute, 'Недостаточно средств на счету');
        }
    }
}
