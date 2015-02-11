<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    'Job Contents',
);

$this->menu = Utils::getOptMenus($this->action->id, null);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?>   </legend>

    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>