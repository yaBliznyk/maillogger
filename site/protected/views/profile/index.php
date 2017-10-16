<?php
/* @var $this ProfileController */
/* @var $model User */
/* @var Transaction[] $transactions */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome <i><?= $model->name ?></i></h1>

<?= $this->renderPartial('_form', ['model' => $model]) ?>

<p>У вас на счету: <b><?= $model->money ?></b> монет</p>

<p>API ключ:</p>
<p><?= $model->api_key ?></p>
<p>Чтобы вывести монеты со счета отправьте POST запрос по ссылке:</p>
<p>
    <?= $this->createAbsoluteUrl(
        '/api/transaction/create',
        ['api_key' => $model->api_key]
    ); ?>
</p>
<p>Где POST['amount'] - количество монет</p>

<?php if ($transactions): ?>
    <h3>Операции:</h3>

    <ol>
        <?php foreach ($transactions as $transaction): ?>
            <li><?= $transaction->created_at; ?> - <b><?= $transaction->amount ?></b> монет</li>
        <?php endforeach; ?>
    </ol>
<?php endif; ?>
