<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    'Job Contents' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . JobContent::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . JobContent::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('job-content-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo JobContent::label(2) ?>    </legend>

    <?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'job-content-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
//            'job_reference_number',
            'oragnization_name',
            'job_title',
//            'content',
            'status',
//            'created_date',
//            'logo_file_name',
//            'count_view',
//            'count_like',
//            'published_date',
//            'un_published_date',
//            'closed_date',
//            'hot_job',
            array(
                'name' => 'province_id',
                'value' => 'isset($data->province) ? $data->province : null',
                'filter' => CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn()),
            ),
//            array(
//                'name' => 'user_id',
//                'value' => 'isset($data->user) ? $data->user : null',
//                'filter' => CHtml::listData(User::model()->findAll(), 'id', User::representingColumn()),
//            ),
            array(
                'name' => 'job_industry_id',
                'value' => 'isset($data->jobIndustry) ? $data->jobIndustry : null',
                'filter' => CHtml::listData(JobIndustry::model()->findAll(), 'id', JobIndustry::representingColumn()),
            ),
            array(
                'name' => 'job_function_id',
                'value' => 'isset($data->jobFunction) ? $data->jobFunction : null',
                'filter' => CHtml::listData(JobFunction::model()->findAll(), 'id', JobFunction::representingColumn()),
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</fieldset>