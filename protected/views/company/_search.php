<?php
/** @var CompanyController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>

<?php // echo $form->textFieldRow($model, 'id', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php // echo $form->textFieldRow($model, 'logo', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php // echo $form->textFieldRow($model, 'status', array('class' => 'span5', 'maxlength' => 9)); ?>
<?php echo $form->dropDownListRow($model, 'status', Utils::enumItem($model, 'status'), array('class' => 'span3')); ?>
<?php echo $form->textAreaRow($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->textFieldRow($model, 'telelphone', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'registered_date', array('class' => 'span5')); ?>
<?php echo $form->textFieldRow($model, 'last_updated', array('class' => 'span5')); ?>
<?php echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())); ?>

<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => Yii::t('app', 'Search'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>
