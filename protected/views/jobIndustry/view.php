<?php
/** @var JobIndustryController $this */
/** @var JobIndustry $model */
$this->breadcrumbs = array(
    'Job Industries' => array('index'),
//    $model->id,
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
//        'id',
            'job_industry_name',
            array(
                'name' => 'image',
                'type' => 'image'
            ),
        ),
    ));
    ?>
</fieldset>