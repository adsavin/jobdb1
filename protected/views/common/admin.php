<?php
/** @var CommonController $this */
/** @var Common $model */
$this->breadcrumbs = array(
    'Commons' => array('index'),
    Yii::t('app', 'Manage'),
);
$this->action->id;
$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('common-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?>   </legend>

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
        'id' => 'common-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            'code',
            'string',
            array(
                "name" => 'number',
                "type" => "number",
            ),
            array(
                "name" => 'date_time',
                "type" => "datetime",
            ),
            array(
                "name" => 'date_time',
                "type" => "datetime",
            ),
            'e_num',
//            array(
//                "name" => 'content',
//                "type" => "raw",
//            ),
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