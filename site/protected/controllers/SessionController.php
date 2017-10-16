<?php

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 15.10.17
 * Time: 15:10
 */
class SessionController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => ['delete'],
                'users'=>array('@'),
            ),
            array('allow',
                'actions' => ['new', 'create'],
                'users'=>array('?'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionNew()
    {
        $model = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate()) {
                $link = new Link();
                $link->email = $model->email;
                if (!$link->save()) {
                    throw new CDbException('Ошибка сохранения ссылки');
                }
                $mailMessage = new FileMailMessage(
                    Yii::app()->params['adminEmail'],
                    $link->email,
                    $this->createAbsoluteUrl('/session/create', [
                        'key' => $link->key
                    ])
                );
                Yii::app()->mailer->send($mailMessage);
                Yii::app()->user->setFlash(
                    'success',
                    'Вам на почту была отправлена ссылка для входа в систему'
                );
                $this->redirect(Yii::app()->homeUrl);
            }
        }

        $this->render('new', ['model' => $model]);
    }

    public function actionCreate($key)
    {
        $link = Link::model()->findByAttributes(['key' => $key]);
        if (!$link) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $user = UserRepository::createIfNotExists($link->email);
        $identity = new UserIdentity($user->email, '');
        $identity->authenticate();
        Yii::app()->user->login($identity);
        $link->delete();
        $this->redirect(['/profile/index']);
    }

    public function actionDelete()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
}