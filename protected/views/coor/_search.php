<?php
/** @var CoorController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'x', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->textFieldRow($model, 'y', array('class' => 'span5', 'maxlength' => 100)); ?>

<?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn())); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
