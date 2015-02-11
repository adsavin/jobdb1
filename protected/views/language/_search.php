<?php
/** @var LanguageController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php // echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php // echo $form->textFieldRow($model, 'used', array('class' => 'span5', 'maxlength' => 3)); ?>
<?php echo $form->dropDownListRow($model, 'used', Utils::enumItem($model, 'used'), array('class' => 'span2')); ?>
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
