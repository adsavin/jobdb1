<?php
/** @var CvController $this */
/** @var Cv $model */
$this->breadcrumbs = array(
    'Cvs' => array('index'),
//    $model->name,
);

$this->menu = array(
    //array('label' => Yii::t('app', 'List') . ' ' . Cv::label(2), 'icon' => 'list', 'url' => array('index')),
//    array('label' => Yii::t('app', 'Create') . ' ' . Cv::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
//    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
//            'id',
            'title',
            'name',
            'surname',
            'birthdate',
            'contact_number',
            array(
                'name' => 'email',
                'type' => 'email'
            ),
            'district',
            'major',
            'graduated_place',
            'graduated_year',
            'language',
            'language_level',
            'experience',
            'job_function_year',
            'computer_skill',
            'salary_min',
            'salary_max',
            array(
                'name' => 'country_id',
                'value' => ($model->country !== null) ? CHtml::link($model->country, array('/country/view', 'id' => $model->country->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                'name' => 'province_id',
                'value' => ($model->province !== null) ? CHtml::link($model->province, array('/province/view', 'id' => $model->province->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                'name' => 'nationality_id',
                'value' => ($model->nationality !== null) ? CHtml::link($model->nationality, array('/nationality/view', 'id' => $model->nationality->id)) . ' ' : null,
                'type' => 'html',
            ),
            array(
                'name' => 'highest_edu_level_id',
                'value' => ($model->highestEduLevel !== null) ? CHtml::link($model->highestEduLevel, array('/highestEduLevel/view', 'id' => $model->highestEduLevel->id)) . ' ' : null,
                'type' => 'html',
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