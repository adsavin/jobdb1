<?php
/** @var MenuTranslateController $this */
/** @var MenuTranslate $model */
$this->breadcrumbs = array(
	'Menu Translates',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . MenuTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo MenuTranslate::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>