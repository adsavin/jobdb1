<?php
/** @var CoorController $this */
/** @var Coor $model */
$this->breadcrumbs = array(
    'Coors' => array('index'),
    Yii::t('app', 'Manage'),
);

//$this->menu = array(
//    array('label' => Yii::t('app', 'List') . ' ' . Coor::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('app', 'Create') . ' ' . Coor::label(), 'icon' => 'plus', 'url' => array('create')),
//);
$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('coor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo Coor::label(2) ?>    </legend>

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
        'id' => 'coor-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            array(
                'name' => 'province_id',
                'value' => 'isset($data->province) ? $data->province : null',
                'filter' => CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn()),
            ),
            'x',
            'y',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</fieldset>