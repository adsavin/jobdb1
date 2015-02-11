<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    'Job Contents' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);

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
    <legend> <?php echo Yii::t('app', 'Manage') ?>   </legend>

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
            'job_reference_number',
            array(
                'name' => 'company_id',
                'value' => 'isset($data->company) ? $data->company : null',
                'filter' => CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()),
            ),
            'job_title',
//            array(
//                'name' => 'status',
//                'value' => 'isset($data->status) ? $data->status : null',
//                'filter' => CHtml::listData(Utils::enumItem($model, "status"), 'status', "status"),
//            ),
            array(
                'name' => 'hot_job',
                'value' => 'isset($data->hot_job) ? $data->hot_job : null',
//                'filter' => CHtml::listData(Utils::enumItem($model, "hot_job"), 'hot_job', "hot_job"),
                'filter' => false,                
            ),
//            'hot_job',
            array(
                "name" => 'closed_date',
                "type" => "date",
                "filter" => false,
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                "header" => "Actions",
//                "template" => "{view} {update} {publish} {repost}",
                "template" => "{update} {publish} {repost}",
                "buttons" => array(
                    "update" => array(
                    ),
                    "view" => array(
                    ),
                    "publish" => array(
                        'icon' => "plus",
                        'label' => Yii::t("app", "Publish"),
                        'url' => 'Yii::app()->controller->createUrl("publish/create&id=$data->id")',
//                        'options' => array(
//                            'class' => 'btn btn-danger',
//                        )
                    ),
                    "repost" => array(
                        'icon' => "repeat",
                        'label' => Yii::t("app", "Re-Post"),
                        'url' => 'Yii::app()->controller->createUrl("repost&id=$data->id")',
                    ),
                )
            ),
        ),
    ));
    ?>
</fieldset>