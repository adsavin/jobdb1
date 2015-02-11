<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs=array(
	'Job Contents'=>array('index'),
	$model->id,
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List') . ' ' . JobContent::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . JobContent::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') . ' ' . JobContent::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id',
        'job_reference_number',
        'oragnization_name',
        'job_title',
        array(
                'name'=>'content',
                'type'=>'ntext'
            ),
        'status',
        'created_date',
        'logo_file_name',
        'count_view',
        'count_like',
        'published_date',
        'un_published_date',
        'closed_date',
        'hot_job',
        array(
			'name'=>'province_id',
			'value'=>($model->province !== null) ? CHtml::link($model->province, array('/province/view', 'id' => $model->province->id)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'user_id',
			'value'=>($model->user !== null) ? CHtml::link($model->user, array('/user/view', 'id' => $model->user->id)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'job_industry_id',
			'value'=>($model->jobIndustry !== null) ? CHtml::link($model->jobIndustry, array('/jobIndustry/view', 'id' => $model->jobIndustry->id)).' ' : null,
			'type'=>'html',
		),
        array(
			'name'=>'job_function_id',
			'value'=>($model->jobFunction !== null) ? CHtml::link($model->jobFunction, array('/jobFunction/view', 'id' => $model->jobFunction->id)).' ' : null,
			'type'=>'html',
		),
	),
)); ?>
</fieldset>