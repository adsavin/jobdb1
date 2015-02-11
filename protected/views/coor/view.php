<?php
/** @var CoorController $this */
/** @var Coor $model */
$this->breadcrumbs = array(
    'Coors' => array('index'),
    $model->id,
);

//$this->menu=array(
//    //array('label' => Yii::t('app', 'List') . ' ' . Coor::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('app', 'Create') . ' ' . Coor::label(), 'icon' => 'plus', 'url' => array('create')),
//	array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
//    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
//    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') . ' ' . Coor::label(); ?> <?php echo CHtml::encode($model) ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
//            'id',
            'x',
            'y',
            array(
                'name' => 'province_id',
                'value' => ($model->province !== null) ? CHtml::link($model->province, array('/province/view', 'id' => $model->province->id)) . ' ' : null,
                'type' => 'html',
            ),
        ),
    ));
    ?>
</fieldset>