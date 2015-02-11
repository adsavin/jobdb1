<?php
/** @var MenuSubController $this */
/** @var MenuSub $model */
$this->breadcrumbs = array(
    'Menu Subs' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menu-sub-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?>    </legend>

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
        'id' => 'menu-sub-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            'name',
//            'link',
//            'content',
            array(
                'name' => 'menu_id',
                'value' => 'isset($data->menu) ? $data->menu : null',
                'filter' => CHtml::listData(Menu::model()->findAll(), 'id', Menu::representingColumn()),
            ),
            'show',
            'order_no',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</fieldset>