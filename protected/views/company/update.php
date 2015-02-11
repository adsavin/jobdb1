<?php
/** @var CompanyController $this */
/** @var Company $model */
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
//    Yii::t('app', $model->name) => array('view', 'id' => $model->id),
    Yii::t('app', 'Update'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Update'); ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>