<?php
/** @var JobContentTranslateController $this */
/** @var JobContentTranslate $model */
$this->breadcrumbs=array(
	'Job Content Translates'=>array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('app', 'List') . ' ' . JobContentTranslate::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('app', 'Create') . ' ' . JobContentTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('job-content-translate-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo JobContentTranslate::label(2) ?>    </legend>

<?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'job-content-translate-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'tranlate',
        array(
                    'name' => 'job_content_id',
                    'value' => 'isset($data->jobContent) ? $data->jobContent : null',
                    'filter' => CHtml::listData(JobContent::model()->findAll(), 'id', JobContent::representingColumn()),
                ),
        array(
                    'name' => 'language_id',
                    'value' => 'isset($data->language) ? $data->language : null',
                    'filter' => CHtml::listData(Language::model()->findAll(), 'id', Language::representingColumn()),
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</fieldset>