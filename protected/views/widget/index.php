<?php
/** @var WidgetController $this */
/** @var Widget $model */
$this->breadcrumbs = array(
	'Widgets',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Widget::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo Widget::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>