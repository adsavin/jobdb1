<?php
/** @var PublishController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php echo $form->textFieldRow($model, 'start_date', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'end_date', array('class' => 'span5')); ?>
<?php echo $form->dropDownListRow($model, 'job_content_id', CHtml::listData(JobContent::model()->findAll(), 'id', JobContent::representingColumn())); ?>
<?php echo $form->textFieldRow($model, 'payment_status', array('class' => 'span5', 'maxlength' => 9)); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => Yii::t('app', 'Search'),
    ));
    ?>
</div>

<?php
$this->endWidget();
