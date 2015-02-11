<?php
/** @var CompanyController $this */
/** @var Company $model */
$this->breadcrumbs = array(
    'Companies' => array('index'),
    $model->name,
);

$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View'); ?></legend>

    <?php
    echo CHtml::tag("div", array("class" => "center"));
    echo CHtml::image("images/company/$model->logo", $model->name, array(
        "style" => "height: 100px;",
    ));
    echo CHtml::closeTag("div");
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'name',
            'status',
            'address',
            'telelphone',
            array(
                'name' => 'email',
                'type' => 'email'
            ),
            array(
                'name' => 'registered_date',
                'type' => 'datetime',
            ),
            array(
                'name' => 'last_updated',
                'type' => 'datetime',
            ),
            array(
                'name' => 'user_id',
                'value' => ($model->user !== null) ? CHtml::link($model->user, array('/user/view', 'id' => $model->user->id)) . ' ' : null,
                'type' => 'html',
            ),
        ),
    ));
    ?>
</fieldset>