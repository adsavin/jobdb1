<?php
/** @var CvController $this */
/** @var Cv $model */
$this->breadcrumbs = array(
    'Cvs' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . Cv::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . Cv::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cv-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo Cv::label(2) ?>    </legend>

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
        'id' => 'cv-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//        'id',
//        'title',
            'name',
            'surname',
//        'birthdate',
//        'contact_number',
            'email',
//            'district',
            'major',
            'graduated_year',
//            'language',
//            'language_level',
//            'experience',
//            'job_function_year',
//            'computer_skill',
//            'salary_min',
//            'salary_max',
//            array(
//                'name' => 'country_id',
//                'value' => 'isset($data->country) ? $data->country : null',
//                'filter' => CHtml::listData(Country::model()->findAll(), 'id', Country::representingColumn()),
//            ),
//            array(
//                'name' => 'province_id',
//                'value' => 'isset($data->province) ? $data->province : null',
//                'filter' => CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn()),
//            ),
//            array(
//                'name' => 'nationality_id',
//                'value' => 'isset($data->nationality) ? $data->nationality : null',
//                'filter' => CHtml::listData(Nationality::model()->findAll(), 'id', Nationality::representingColumn()),
//            ),
//            array(
//                'name' => 'highest_edu_level_id',
//                'value' => 'isset($data->highestEduLevel) ? $data->highestEduLevel : null',
//                'filter' => CHtml::listData(HighestEduLevel::model()->findAll(), 'id', HighestEduLevel::representingColumn()),
//            ),
//            array(
//                'name' => 'user_id',
//                'value' => 'isset($data->user) ? $data->user : null',
//                'filter' => CHtml::listData(User::model()->findAll(), 'id', User::representingColumn()),
//            ),
//            array(
//                'name' => 'graduated_country_id',
//                'value' => 'isset($data->graduatedCountry) ? $data->graduatedCountry : null',
//                'filter' => CHtml::listData(Country::model()->findAll(), 'id', Country::representingColumn()),
//            ),
            'status',
            'is_lock',
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