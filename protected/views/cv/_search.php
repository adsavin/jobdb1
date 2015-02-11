<?php
/** @var CvController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'title', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'surname', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->datepickerRow($model, 'birthdate', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

<?php echo $form->textFieldRow($model, 'contact_number', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'district', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'major', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'graduated_year', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'language', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'language_level', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'experience', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'job_function_year', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'computer_skill', array('class' => 'span5', 'maxlength' => 255)); ?>

<?php echo $form->textFieldRow($model, 'salary_min', array('class' => 'span5')); ?>

<?php echo $form->textFieldRow($model, 'salary_max', array('class' => 'span5')); ?>

<?php echo $form->dropDownListRow($model, 'country_id', CHtml::listData(Country::model()->findAll(), 'id', Country::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'nationality_id', CHtml::listData(Nationality::model()->findAll(), 'id', Nationality::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'highest_edu_level_id', CHtml::listData(HighestEduLevel::model()->findAll(), 'id', HighestEduLevel::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'graduated_country_id', CHtml::listData(Country::model()->findAll(), 'id', Country::representingColumn())); ?>

<?php echo $form->textFieldRow($model, 'status', array('class' => 'span5', 'maxlength' => 9)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
