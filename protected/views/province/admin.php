<?php
/** @var ProvinceController $this */
/** @var Province $model */
$this->breadcrumbs = array(
    'Provinces' => array('index'),
    Yii::t('app', 'Manage'),
);

//$this->menu = array(
//    array('label' => Yii::t('app', 'List') . ' ' . Province::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('app', 'Create') . ' ' . Province::label(), 'icon' => 'plus', 'url' => array('create')),
//);

$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('province-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo Province::label(2) ?>    </legend>

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
        'id' => 'province-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            'province_code',
            'province_name_lo',
            'province_name_en',            
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                "template" => "{view}{update}",
            ),
        ),
    ));
    ?>
</fieldset>