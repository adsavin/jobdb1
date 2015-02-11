<?php
/** @var JobContentTranslateController $this */
/** @var JobContentTranslate $model */
$this->breadcrumbs=array(
	$model->label(2) => array('index'),
	Yii::t('app', $model->job_content_id) => array('view', 'id'=>$model->job_content_id),
	Yii::t('app', 'Update'),
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List') . ' ' . JobContentTranslate::label(2), 'icon' => 'list', 'url' => array('index')),
	//array('label' => Yii::t('app', 'Create') . ' ' . JobContentTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
	//array('label' => Yii::t('app', 'View'), 'icon' => 'eye-open', 'url'=>array('view', 'id' => $model->job_content_id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->job_content_id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
	array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Update') . ' ' . JobContentTranslate::label(); ?> <?php echo CHtml::encode($model) ?></legend>
    <?php echo $this->renderPartial('_form',array('model' => $model)); ?>
</fieldset>