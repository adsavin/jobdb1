<?php
/** @var PublishController $this */
/** @var Publish $model */
$this->breadcrumbs = array(
    'Publishes' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('publish-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend> <?php echo Yii::t('app', 'Manage') ?> </legend>

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
        'id' => 'publish-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'jobContent.company_id',
                'value' => 'isset($data->jobContent->company) ? $data->jobContent->company->name : null',
                'filter' => CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()),
                "htmlOptions" => array(
                    "class" => 'span3'
                )
            ),
            array(
                'name' => 'job_content_id',
                'value' => 'isset($data->jobContent) ? $data->jobContent->job_title : null',
                'filter' => CHtml::listData(JobContent::model()->findAll(), 'id', JobContent::representingColumn()),
                "htmlOptions" => array(
                    "class" => 'span4'
                )
            ),
            array(
                "name" => 'start_date',
                "type" => "datetime",
                "htmlOptions" => array(
                    "class" => 'span2',
                    "style" => "text-align: center"
                )
            ),
            array(
                "name" => 'end_date',
                "type" => "datetime",
                "htmlOptions" => array(
                    "class" => 'span2',
                    "style" => "text-align: center"
                )
            ),
            array(
                "name" => 'payment_status',
                'filter' => CHtml::listData(Utils::enumItem($model, "payment_status"), "payment_status", "payment_status"),
                "htmlOptions" => array(
                    "class" => 'span2',
                    "style" => "text-align: center"
                )
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                "header" => "Actions",
                "template" => "{view} {update}",
                "buttons" => array(
                    "update" => array(
                    ),
                    "view" => array(
                    ),
                )
            ),
        ),
    ));
    ?>
</fieldset>