<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('job-content-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php
//Yii::app()->clientScript->registerScript('for-date-picker', "
//function reInstallDatepicker(id, data){
//$('#published_date').datepicker({'dateFormat':'yy-mm-dd'});
//$('#published_date').datepicker({'dateFormat':’yy-mm-dd'});
//}
//");
?>

<!--<h3 class="header" style="margin-top: 40px;">-->
<?php // echo Yii::t('app', 'The Newest Job List'); ?>
    <!--<span class="header-line"></span>--> 
<!--</h3>-->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'job-content-grid',
    'type' => 'striped condensed',
    'dataProvider' => $model->searchPublishedJob(),
    'filter' => $model,
    'columns' => array(
        Utils::getSequence(),
        array(
            'name' => 'logo_file_name',
            "header" => "Logo",
            'type' => 'raw',
            'value' => 'isset($data->company) && file_exists($data->company->imageFullPath)?CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/company/".$data->company->logo,"", array("style"=>"width:100px;height:60px;")),Yii::app()->createUrl("site/ViewJobDetail",array("id"=>$data->id)),array("target"=>""))'
            . ':'
            . 'CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/logos/no_image_available.jpg","", array("style"=>"width:100px;height:60px;")),Yii::app()->createUrl("site/ViewJobDetail",array("id"=>$data->id)),array("target"=>""))',
            'filter' => FALSE,
            "headerHtmlOptions" => array(
                "style" => "border-bottom-color: #3b5998;vertical-alignment: bottom",
            ),
            "htmlOptions" => array(
                "class" => "center",
            ),
        ),
        array(
            'name' => 'company_id',
            'value' => 'isset($data->company) ? $data->company : null',
            'filter' => CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()),
        ),
        array(
            "header" => "Position",
            'name' => 'job_title',
            'type' => 'raw',
            'value' => 'CHtml::link($data["job_title"],Yii::app()->createUrl("site/ViewJobDetail",array("id"=>$data->id)),array("target"=>""))',
            'filter' => $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'model' => $model,
                'attribute' => 'job_title',
                'source' => $controller->createUrl('site/autoCompleteJobTitle'),
                'options' => array(
                    'focus' => "js:function(event, ui) {
                        $('#" . CHtml::activeId($model, 'job_title') . "').val(ui.item.value);
                    }",
                    'select' => "js:function(event, ui) {
                        $.fn.yiiGridView.update('job-content-grid', {
                            data: $('#job-content-grid .filters input, #job-content-grid .filters select').serialize()
                        });
                    }"
                ),
                    ), true),
        ),
        array(
            'name' => 'closed_date',
//            'value' => 'date_format(strtotime($data->closed_date), "d/M/Y")',
            'value' => 'date_format(date_create($data->closed_date), "d/m/Y")',
//            'type' => 'date',
            "htmlOptions" => array(
                "class" => "center",
            ),
            "headerHtmlOptions" => array(
                "style" => "border-bottom-color: #3b5998;vertical-alignment: bottom",
            ),
            'filter' => FALSE,
        ),
    ),
    'emptyText' => Yii::t('app', 'No results found.'),
//    'summaryText' => Yii::t('app', 'Displaying {start}-{end} of {count} result(s).'),
    'summaryText' => "",
    "pagerCssClass" => "pagination center",
    'pager' => array(
        'header' => '',
        'cssFile' => false,
        'maxButtonCount' => 20,
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
        'firstPageCssClass' => 'previous',
        'lastPageCssClass' => 'next',
        'firstPageLabel' => Yii::t('app', 'First'),
        'lastPageLabel' => Yii::t('app', 'Last'),
        'prevPageLabel' => Yii::t('app', 'Previous'),
        'nextPageLabel' => Yii::t('app', 'Next'),
    ),
    'afterAjaxUpdate' => "function(){
        jQuery('#" . CHtml::activeId($model, 'job_title') . "').autocomplete({
            'delay':300,
            'minLength':2,
            'source':'" . $controller->createUrl('site/autoCompleteJobTitle') . "',
            'focus':function(event, ui) {
                $('#" . CHtml::activeId($model, 'job_title') . "').val(ui.item.value);
            },
            'select':function(event, ui) {
                $.fn.yiiGridView.update('job-content-grid', {
                    data: $('#job-content-grid .filters input, #job-content-grid .filters select').serialize()
                });
            }
        });
    }",
));

