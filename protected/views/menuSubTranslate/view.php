<?php
/** @var MenuSubTranslateController $this */
/** @var MenuSubTranslate $model */
$this->breadcrumbs=array(
	'Menu Sub Translates'=>array('index'),
	$model->name,
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List') . ' ' . MenuSubTranslate::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . MenuSubTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') . ' ' . MenuSubTranslate::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id',
        'name',
        'content',
        array(
			'name'=>'language_id',
			'value'=>($model->language !== null) ? CHtml::link($model->language, array('/language/view', 'id' => $model->language->id)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'menu_sub_id',
			'value'=>($model->menuSub !== null) ? CHtml::link($model->menuSub, array('/menuSub/view', 'id' => $model->menuSub->id)).' ' : null,
			'type'=>'html',
		),
	),
)); ?>
</fieldset>