<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    'Job Contents' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . JobContent::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . JobContent::label(), 'icon' => 'plus', 'url' => array('create')),
);

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

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo JobContent::label(2) ?>    </legend>



    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'job-content-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            Utils::getSequence(),
             array(
            'name' => 'logo_file_name',
            'type' => 'raw',
                 
            'value' => '$data->logo_file_name!="" && file_exists($data->imageFile) ?CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/logos/".$data->logo_file_name,"", array("style"=>"width:100px;height:100px;")),Yii::app()->createUrl("jobcontent/view",array("id"=>$data->id)))'
            . ':'
            . 'CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/logos/no_image_available.jpg","", array("style"=>"width:100px;height:100px;")),Yii::app()->createUrl("jobcontent/view",array("id"=>$data->id)))',
            'filter' => FALSE
        ),
            array(
                'name' => 'oragnization_name',
                'type' => 'raw',
                'value' => 'CHtml::link($data["oragnization_name"],Yii::app()->createUrl("jobcontent/view",array("id"=>$data->id)))'
            ),
            array(
                'name' => 'job_title',
                'type' => 'raw',
                'value' => 'CHtml::link($data["job_title"],Yii::app()->createUrl("jobcontent/view",array("id"=>$data->id)))'
            ),
            'job_function',
            'job_industry',
//            array(
//                'name'=>'content',
//                'type'=>'raw'
//                ),
            'status',
//            'created_date',
//            
//            'count_view',
//            'count_like',
//            'published_date',
//            'un_published_date',
//            array(
//                'name' => 'user_id',
//                'value' => 'isset($data->user) ? $data->user : null',
//                'filter' => CHtml::listData(User::model()->findAll(), 'id', User::representingColumn()),
//            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'header' => Yii::t('app', 'Operations'),
                'template' => ' {update} ',
                'buttons' => array(
                    
                    'update' => array(
                        //'visible' => '$data->purchaseOrderStatus["status_name"]=="Created"?true:false',
                        'label' => Yii::t('app', 'Update'),
                        'icon' => 'icon-edit',
                        'options' => array(
                            'class' => 'btn btn-success',
                        //    'disabled' => '$data->status!="Created"?true:false',
                        )
                    ),
                ),
                'htmlOptions' => array('style' => 'width:10px'),
            )
        ),
        'emptyText' => Yii::t('app', 'No results found.'),
        'summaryText' => Yii::t('app', 'Displaying {start}-{end} of {count} result(s).'),
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
    ));
    ?>
</fieldset>