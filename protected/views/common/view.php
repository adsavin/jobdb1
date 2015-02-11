<?php
/** @var CommonController $this */
/** @var Common $model */
$this->breadcrumbs = array(
    'Commons' => array('index'),
//    $model->id,
);

$this->menu = $this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View'); ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
//            'id',
            'code',
            'string',
            array(
                "name" => 'number',
                "type" => "number",
            ),
            array(
                "name" => 'date_time',
                "type" => "datetime",
            ),
            "e_num",
            array(
                "name" => 'content',
                "type" => "raw",
            )
        ),
    ));
    ?>
</fieldset>