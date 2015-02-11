<?php
/** @var LanguageController $this */
/** @var Language $model */
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Create'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Create'); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>