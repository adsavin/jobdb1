<?php
/** @var MenuController $this */
/** @var Menu $model */
$this->breadcrumbs = array(
    'Menus' => array('index'),
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
            'show',
            'section',
            'order_no',
            array(
                "name" => 'content',
                "type" => "html",
            ),
        ),
    ));
    ?>
</fieldset>