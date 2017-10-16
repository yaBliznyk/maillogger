<?php
/* @var $this ProfileController */
/* @var $model User */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome <i><?php echo CHtml::encode(Yii::app()->user->name); ?></i></h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

<div class="row">
    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name'); ?>
    <?php echo $form->error($model, 'name'); ?>
</div>

<div class="row buttons">
    <?php echo CHtml::submitButton('Изменить имя'); ?>
</div>

<?php $this->endWidget(); ?>

<p>У вас на счету: <?= $model->money ?> монет</p>

<p>API ключ:</p>
<p><?= $model->api_key ?></p>
<p>Чтобы вывести монеты со счета отправьте POST запрос по ссылке:</p>
<p>
    <?= $this->createAbsoluteUrl(
        '/api/transaction/create',
        ['amount' => 'amount', 'api_key' => $model->api_key]
    ); ?>
</p>
