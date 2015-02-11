<?php
/** @var CoorController $this */
/** @var Coor $model */
$this->breadcrumbs = array(
    'Coors',
);

//$this->menu = array(
//    array('label' => Yii::t('app', 'Create') . ' ' . Coor::label(), 'icon' => 'plus', 'url' => array('create')),
//    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
$this->menu = Utils::getOptMenus($this->action->id, null);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?> <?php echo Coor::label(2) ?>    </legend>

    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>