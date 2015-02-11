<?php
/** @var WidgetController $this */
/** @var Widget $model */
$this->breadcrumbs = array(
    'Widgets' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . Widget::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . Widget::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('widget-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo Widget::label(2) ?>    </legend>

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
        'id' => 'widget-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            'name',
            'title',
//            'content',
            'order_no',
            'is_show',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</fieldset>