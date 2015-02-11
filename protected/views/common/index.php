<?php
/** @var CommonController $this */
/** @var Common $model */
$this->breadcrumbs = array(
	'Commons',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . Common::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo Common::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>