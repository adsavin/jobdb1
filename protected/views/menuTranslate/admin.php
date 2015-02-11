<?php
/** @var MenuTranslateController $this */
/** @var MenuTranslate $model */
$this->breadcrumbs=array(
	'Menu Translates'=>array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu=array(
	array('label' => Yii::t('app', 'List') . ' ' . MenuTranslate::label(2), 'icon' => 'list', 'url' => array('index')),
	array('label' => Yii::t('app', 'Create') . ' ' . MenuTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('menu-translate-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo MenuTranslate::label(2) ?>    </legend>

<?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id' => 'menu-translate-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'name',
        'content',
        array(
                    'name' => 'language_id',
                    'value' => 'isset($data->language) ? $data->language : null',
                    'filter' => CHtml::listData(Language::model()->findAll(), 'id', Language::representingColumn()),
                ),
        array(
                    'name' => 'menu_id',
                    'value' => 'isset($data->menu) ? $data->menu : null',
                    'filter' => CHtml::listData(Menu::model()->findAll(), 'id', Menu::representingColumn()),
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</fieldset>