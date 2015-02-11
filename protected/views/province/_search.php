<?php
/** @var ProvinceController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'province_name_lo', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'province_name_en', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'province_code', array('class' => 'span5', 'maxlength' => 5)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
