<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
//	Yii::t('app', $model->id) => array('view', 'id'=>$model->id),
    Yii::t('app', 'Update'),
);

$this->menu = array_merge(Utils::getOptMenus($this->action->id, $model), array(
    array('label' => Yii::t('app', 'Publish'), 'icon' => 'share', 'url' => array('/publish/index'))
        ));
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Update') ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>