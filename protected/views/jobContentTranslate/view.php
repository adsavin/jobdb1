<?php
/** @var JobContentTranslateController $this */
/** @var JobContentTranslate $model */
$this->breadcrumbs=array(
	'Job Content Translates'=>array('index'),
	$model->job_content_id,
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List') . ' ' . JobContentTranslate::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . JobContentTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->job_content_id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->job_content_id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') . ' ' . JobContentTranslate::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        array(
                'name'=>'tranlate',
                'type'=>'ntext'
            ),
        array(
			'name'=>'job_content_id',
			'value'=>($model->jobContent !== null) ? CHtml::link($model->jobContent, array('/jobContent/view', 'id' => $model->jobContent->id)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'language_id',
			'value'=>($model->language !== null) ? CHtml::link($model->language, array('/language/view', 'id' => $model->language->id)).' ' : null,
			'type'=>'html',
		),
	),
)); ?>
</fieldset>