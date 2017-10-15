<?php

/**
 * This is the model class for table "links".
 *
 * The followings are the available columns in table 'links':
 * @property integer $id
 * @property string $email
 * @property string $key
 * @property string $created_at
 */
class Link extends CActiveRecord
{
    const KEY_LENGTH = 10;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'links';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'required'),
            array('email', 'length', 'max' => 255),
            array('key', 'unique'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'key' => 'Key',
            'created_at' => 'Created At',
        );
    }

    public function generateKey()
    {
        $this->key = Yii::app()->securityManager->generateRandomString(self::KEY_LENGTH);
    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->generateKey();
                $this->created_at = date('Y-m-d H:i:s');
            }
            return true;
        } else {
            return false;
        }
    }

    public function sendMail()
    {
        Yii::app()->mailer->sendMailMessage('MailKeyLogin', $this);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Link the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
