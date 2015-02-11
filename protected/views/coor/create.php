<?php
/** @var CoorController $this */
/** @var Coor $model */
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Create'),
);

//$this->menu=array(
//    //array('label' => Yii::t('app', 'List').' '.Coor::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Create') . ' ' . Coor::label(); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>