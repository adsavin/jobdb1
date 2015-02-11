<?php
/** @var MenuController $this */
/** @var Menu $model */
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Update'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Update') ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>