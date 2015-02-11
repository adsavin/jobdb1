<?php
/** @var CommonController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php // echo $form->textFieldRow($model, 'id', array('class' => 'span5'));  ?>
<?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 10)); ?>
<?php echo $form->textFieldRow($model, 'string', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'number', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'date_time', array('class' => 'span5')); ?>
<?php echo $form->textAreaRow($model, 'content', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => Yii::t('app', 'Search'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
