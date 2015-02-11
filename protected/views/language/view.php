<?php
/** @var LanguageController $this */
/** @var Language $model */
$this->breadcrumbs = array(
    'Languages' => array('index'),
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
            'code',
            'name',
            'used',
        ),
    ));
    ?>
</fieldset>