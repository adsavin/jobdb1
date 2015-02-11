<?php
/** @var JobContentTranslateController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

<?php echo $form->textAreaRow($model,'tranlate',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

<?php echo $form->dropDownListRow($model, 'job_content_id', CHtml::listData(JobContent::model()->findAll(), 'id', JobContent::representingColumn())); ?>

<?php echo $form->dropDownListRow($model, 'language_id', CHtml::listData(Language::model()->findAll(), 'id', Language::representingColumn())); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
			'type' => 'primary',
			'label' => Yii::t('app', 'Search'),
		)); ?>
</div>

<?php $this->endWidget(); ?>
