<?php
/** @var InvoiceController $this */
/** @var Invoice $model */
$this->breadcrumbs = array(
    'Invoices' => array('index'),
    Yii::t('app', 'Manage'),
);
//$this->menu = array(
//    array('label' => Yii::t('app', 'List'), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
//);
$this->menu = Utils::getOptMenus($this->action->id, $model);

//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$.fn.yiiGridView.update('invoice-grid', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'Manage') ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'invoice-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//            'id',
            array(
                'name' => 'no',
                'htmlOptions' => array(
                    "style" => "text-align: center",
                    "class" => "span2",
                ),
//                'filter' => CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()),
            ),
            array(
                'name' => 'company_id',
                'value' => 'isset($data->company) ? $data->company : null',
                'htmlOptions' => array(
                    "style" => "text-align: center",
//                    "class" => "span2",
                ),
                'filter' => CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()),
            ),
            array(
                'name' => 'created_date',
                'htmlOptions' => array(
                    "style" => "text-align: center",
                    "class" => "span2",
                ),
            ),
            array(
                'name' => 'total',
                'value' => 'number_format($data->total)',
                'htmlOptions' => array(
                    "style" => "text-align: center",
                    "class" => "span2",
                ),
            ),
            array(
                'name' => 'payment_status',
                'filter' => CHtml::listData(Utils::enumItem($model, 'payment_status'), 'payment_status', 'payment_status'),
                'htmlOptions' => array(
                    "style" => "text-align: center",
                    "class" => "span2",
                ),
            ),
            array(
                "name" => "id",
                'value' => '$data->payment_status=="Pending"?CHtml::link(Yii::t("app", "Received"), array("invoice/paid&id=$data->id"), array("class" => "btn btn-danger btn-received")):""',
                "type" => "raw",
                "header" => Yii::t("app", "Received"),
                "filter" => false,
                "htmlOptions" => array(
                    "class" => "span2",
                    "style" => "text-align: center",
                )
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template' => '{view} {delete}'
            ),
        ),
    ));
    ?>
</fieldset>
<script>
    jQuery('body').on('click', '.btn-received', function () {
        if (confirm('Are you sure you want to delete this item?')) 
            return true;
        else
            return false;
    });
</script>