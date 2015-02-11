<?php
/** @var ProvinceController $this */
/** @var Province $model */
$this->breadcrumbs = array(
	'Provinces',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Province::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo Province::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>