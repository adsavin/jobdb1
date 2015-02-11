<?php
/** @var UserController $this */
/** @var User $model */
$this->breadcrumbs = array(
	'Users',
);

$this->menu = array(
    array('label' => Yii::t('app', 'Create') . ' ' . User::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo User::label(2) ?>    </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>
</fieldset>