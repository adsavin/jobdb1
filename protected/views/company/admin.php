<?php
/** @var CompanyController $this */
/** @var Company $model */
$this->breadcrumbs = array(
    'Companies' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('company-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo Company::label(2) ?>    </legend>

    <?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'company-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            array(
                "name" => 'logo',
                "value" => 'CHtml::image("images/company/$data->logo",$data->name,array("style" => "height: 50px;"))',
                'type' => 'raw',
                "htmlOptions" => array(
                    "style" => "text-align: center;",
                )
            ),
            'no',
            'name',
            array(
                "name" => 'status',
                "filter" => CHtml::listData(Utils::enumItem($model, 'status'), 'status', "status"),
            ),
//            'address',
            'telelphone',
            array(
                "name" => 'email',
                "type" => 'email',
            ),
//            'registered_date',
//            'last_updated',
//            array(
//                'name' => 'user_id',
//                'value' => 'isset($data->user) ? $data->user : null',
//                'filter' => CHtml::listData(User::model()->findAll(), 'id', User::representingColumn()),
//            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                "header" => "Actions",
                "template" => "{view} {update}",
                "buttons" => array(
                    "update" => array(
                    ),
                    "view" => array(
                    ),
                )
            ),
        ),
    ));
    ?>
</fieldset>