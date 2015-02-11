<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    'Job Contents' => array('index'),
    Yii::t("app", "View"),
);

$this->menu = array_merge(Utils::getOptMenus($this->action->id, $model), array(
    array('label' => Yii::t('app', 'Publish'), 'icon' => 'share', 'url' => array('/publish/index'))
        ));
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'job_reference_number',
            array(
                'name' => 'company_id',
                'value' => ($model->company !== null) ? CHtml::link($model->company, array('/company/view', 'id' => $model->company->id)) . ' ' : null,
                'type' => 'html',
            ),
            'job_title',
            array(
                'name' => 'content',
                "value" => '<div id="show_content">' . CHtml::linkButton("Show") . '</div><div>' . $model->content . '</div>',
                'type' => 'raw',
            ),
            'status',
            array(
                "name" => 'created_date',
                "type" => "datetime",
            ),
            'count_view',
            'count_like',
            array(
                "name" => 'closed_date',
                "type" => "date",
            ),
            'hot_job',
            array(
                'name' => 'province_id',
                'value' => ($model->province !== null) ? CHtml::link($model->province, array('/province/view', 'id' => $model->province->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                'name' => 'job_function_id',
                'value' => ($model->jobFunction !== null) ? CHtml::link($model->jobFunction, array('/jobFunction/view', 'id' => $model->jobFunction->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                'name' => 'job_type_id',
                'value' => ($model->jobType !== null) ? CHtml::link($model->jobType, array('/jobType/view', 'id' => $model->jobType->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                'name' => 'user_id',
                'value' => ($model->user !== null) ? CHtml::link($model->user, array('/user/view', 'id' => $model->user->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                "name" => 'last_update',
                "type" => "datetime",
            ),
        ),
    ));
    ?>
</fieldset>
<script>
    $('#show_content').click(function () {
        $(this).next().toggle();
        return false;
    }).next().hide();
</script>