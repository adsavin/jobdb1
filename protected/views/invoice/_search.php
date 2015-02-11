<?php
/** @var InvoiceController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'no', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'created_date', array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())); ?>

<?php echo $form->textFieldRow($model, 'payment_status', array('class' => 'span5', 'maxlength' => 8)); ?>

<?php echo $form->textFieldRow($model, 'discount', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'total', array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'company_id', CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn())); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
