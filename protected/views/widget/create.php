<?php
/** @var WidgetController $this */
/** @var Widget $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Create'),
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List').' '.Widget::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Create') . ' ' . Widget::label(); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>