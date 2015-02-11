<?php
/** @var JobContentController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'job_reference_number', array('class' => 'span5', 'maxlength' => 45)); ?>

<?php echo $form->textFieldRow($model, 'oragnization_name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'job_title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?php echo $form->textFieldRow($model, 'status', array('class' => 'span5', 'maxlength' => 12)); ?>

<?php echo $form->textFieldRow($model, 'created_date', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'logo_file_name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'count_view', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'count_like', array('class' => 'span5')); ?>

<?php echo $form->datepickerRow($model, 'published_date', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->datepickerRow($model, 'un_published_date', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->datepickerRow($model, 'closed_date', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'hot_job', array('class' => 'span5', 'maxlength' => 3)); ?>

<?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'job_industry_id', CHtml::listData(JobIndustry::model()->findAll(), 'id', JobIndustry::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'job_function_id', CHtml::listData(JobFunction::model()->findAll(), 'id', JobFunction::representingColumn())); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
