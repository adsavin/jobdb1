<?php
/** @var WidgetController $this */
/** @var Widget $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('app', $model->name) => array('view', 'id'=>$model->id),
	Yii::t('app', 'Update'),
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List') . ' ' . Widget::label(2), 'icon' => 'list', 'url' => array('index')),
	//array('label' => Yii::t('app', 'Create') . ' ' . Widget::label(), 'icon' => 'plus', 'url' => array('create')),
	//array('label' => Yii::t('app', 'View'), 'icon' => 'eye-open', 'url'=>array('view', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
	array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Update') . ' ' . Widget::label(); ?> <?php echo CHtml::encode($model) ?></legend>
    <?php echo $this->renderPartial('_form',array('model' => $model)); ?>
</fieldset>