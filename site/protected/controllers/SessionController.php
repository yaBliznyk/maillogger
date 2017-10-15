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
        $model = new LoginForm();

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                $link = new Link();
                $link->email = $model->email;
                if ($link->save()) {
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
                    $this->redirect(['/site/index']);
                } else {
                    throw new CDbException('Ошибка сохранения ссылки');
                };
            }
        }

        $this->render('new', ['model' => $model]);
    }

    public function actionCreate($key)
    {
        $link = Link::model()->findByAttributes(['key' => $key]);
        if (!$link) {
            $this->redirect(['/site/index']);
        }
        $user = UserRepository::createIfNotExists($link->email);
        $identity = new UserIdentity($user->email, '');
        $identity->authenticate();
        Yii::app()->user->login($identity);
        $this->redirect(['/profile/index']);
    }
}