<?php
/** @var QuatationController $this */
/** @var Quatation $model */
//$this->breadcrumbs=array(
//	'Quatations'=>array('index'),
//	Yii::t('app', 'Manage'),
//);

$this->menu = array(
    array('label' => Yii::t('app', 'List'), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'View'), 'icon' => 'search', 'url' => array('view')),
);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo Quatation::label(2) ?>    </legend>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'quatation-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'position',
                "htmlOptions" => array(
                    'style' => 'text-align: center',
                )
            ),
            array(
                'name' => 'price',
                'value' => 'number_format($data->price)',
                "htmlOptions" => array(
                    'style' => 'text-align: center',
                )
            ),
            array(
                'name' => 'discount',
                "htmlOptions" => array(
                    'style' => 'text-align: center',
                )
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => "{update} - {delete}"
            ),
        ),
    ));
    ?>
</fieldset>