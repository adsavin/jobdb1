<?php
/** @var MenuSubController $this */
/** @var MenuSub $model */
$this->breadcrumbs = array(
    'Menu Subs' => array('index'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
//            'id',
            'name',
            array(
                'name' => 'link',
                'type' => 'url'
            ),
            array(
                'name' => 'menu_id',
                'value' => ($model->menu !== null) ? CHtml::link($model->menu, array('/menu/view', 'id' => $model->menu->id)) . ' ' : null,
                'type' => 'html',
            ),
            'show',
            'order_no',
            array(
                "name" => 'content',
                "type" => "html",
            ),
        ),
    ));
    ?>
</fieldset>