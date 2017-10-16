<?php
/* @var $this ProfileController */

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'user-form',
    'action' => $this->createUrl('/profile/update'),
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