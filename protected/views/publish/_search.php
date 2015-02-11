<?php
/** @var PublishController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php // echo $form->textFieldRow($model, 'start_date', array('class' => 'span5')); ?>
<?php echo $form->datepickerRow($model, 'start_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7', "options" => array("format" => "yyyy-mm-dd", "weekStart" => 1, "viewFormat" => "dd/mm/yyyy"))) ?>
<?php // echo $form->textFieldRow($model, 'end_date', array('class' => 'span5')); ?>
<?php echo $form->datepickerRow($model, 'end_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7', "options" => array("format" => "yyyy-mm-dd", "weekStart" => 1, "viewFormat" => "dd/mm/yyyy"))) ?>
<?php echo $form->dropDownListRow($model, 'job_content_id', CHtml::listData(JobContent::model()->findAll(), 'id', JobContent::representingColumn())); ?>
<?php // echo $form->textFieldRow($model, 'payment_status', array('class' => 'span5', 'maxlength' => 9)); ?>
<?php // echo $form->dropDownListRow($model, "payment_status", CHtml::listData(Utils::enumItem($model, "payment_status"), "payment_status", "payment_status")) ?>


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
