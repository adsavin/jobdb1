<?php
/** @var JobContentTranslateController $this */
/** @var JobContentTranslate $model */
$this->breadcrumbs = array(
	'Job Content Translates',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . JobContentTranslate::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo JobContentTranslate::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>