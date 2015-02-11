<?php
/** @var MenuSubController $this */
/** @var AweActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
        ));
?>
<?php // echo $form->textFieldRow($model, 'id', array('class' => 'span5'));   ?>
<?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldRow($model, 'link', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textAreaRow($model, 'content', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
<?php echo $form->dropDownListRow($model, 'menu_id', CHtml::listData(Menu::model()->findAll(), 'id', Menu::representingColumn())); ?>
<?php // echo $form->textFieldRow($model, 'show', array('class' => 'span5', 'maxlength' => 3)); ?>
<?php echo $form->dropDownListRow($model, 'show', Utils::enumItem($model, "show")); ?>
<?php echo $form->textFieldRow($model, 'order_no', array('class' => 'span5', 'maxlength' => 5)); ?>
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

