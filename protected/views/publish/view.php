<?php
/** @var PublishController $this */
/** @var Publish $model */
$this->breadcrumbs = array(
    Yii::t("app", 'Publishes') => array('index'),
    Yii::t("app", "View")
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            array(
                'name' => 'job_content_id',
                'value' => ($model->jobContent !== null) ? CHtml::link($model->jobContent, array('/jobContent/view', 'id' => $model->jobContent->id)) . ' ' : null,
                'type' => 'html',
            ),
            'start_date',
            'end_date',
            'payment_status',
        ),
    ));
    ?>
</fieldset>