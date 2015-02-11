<?php
/** @var JobIndustryController $this */
/** @var JobIndustry $model */
$this->breadcrumbs = array(
    'Job Industries',
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend> <?php echo Yii::t('app', 'List') ?>   </legend>

    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>