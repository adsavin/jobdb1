<?php
/** @var JobIndustryController $this */
/** @var JobIndustry $model */
$this->breadcrumbs = array(
    'Job Industries' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('job-industry-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Manage') ?>    </legend>

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
        'id' => 'job-industry-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                "name" => 'image',
                "value" => 'CHtml::image("images/industry/" . $data->image, $data->job_industry_name, array("style"=>"height: 50px;"))',
                "type" => "raw",
                "htmlOptions" => array(
                    "style" => "text-align: center;"
                )
            ),
            array(
                "name" => 'job_industry_name',
                "header" => "Name",
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