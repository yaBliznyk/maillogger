<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $api_key
 * @property integer $money
 * @property string $created_at
 */
class User extends CActiveRecord
{
    const API_KEY_LENGTH = 10;
    const DEFAULT_MONEY = 1000;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, name', 'required'),
            array('email', 'unique'),
            array('name, email', 'length', 'max' => 100),
            array('money', 'length', 'max' => 12),
            array('money', 'numerical', 'min' => 0),
            array('money', 'unsafe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, mail, api_key, money, created_at', 'safe', 'on' => 'search'),
        );
    }

    public function generateUniqueKey()
    {
        $api_key = null;
        while (true) {
            $api_key = Yii::app()->securityManager->generateRandomString(self::API_KEY_LENGTH);
            if (!self::model()->exists('api_key = :api_key', [':api_key' => $api_key])) {
                break;
            }
        }
        $this->api_key = $api_key;

    }

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                if (!$this->api_key) {
                    $this->generateUniqueKey();
                }
                $this->money = self::DEFAULT_MONEY;
                $this->created_at = date('Y-m-d H:i:s');
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'mail' => 'Mail',
            'api_key' => 'Api Key',
            'money' => 'Money',
            'created_at' => 'Created At',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
