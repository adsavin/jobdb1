<?php
/** @var PublishController $this */
/** @var Publish $model */
$this->breadcrumbs = array(
	'Publishes',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Publish::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo Publish::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>