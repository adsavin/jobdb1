<?php
/** @var JobContentController $this */
/** @var JobContent $model */
$this->breadcrumbs = array(
    'Job Contents' => array('index'),
    $model->job_title,
);

$this->menu = array(
    //array('label' => Yii::t('app', 'List') . ' ' . JobContent::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . JobContent::label(), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <div id="displayLogo" style="text-align: center">
   <!--<a href="#" class="thumbnail" rel="tooltip" data-title="<?php //echo 'Logo File';     ?>">-->
        <?php $file = Yii::app()->baseUrl . '/images/logos/' . $model->logo_file_name; ?>
        
        <?php if (!file_exists($model->getPath()) || $model->logo_file_name==NULL): ?>
            <?php $file = Yii::app()->baseUrl . '/images/logos/no_image_available.jpg' ?>
        <?php endif; ?>
        <img src="<?php echo $file; ?>" alt="Logo File">
        <!--</a>-->
    </div>
    <span class="badge badge-warning"> 
        <?php echo Yii::t('app', 'View:') . ' ' . CHtml::decode($model->count_view) . ' ' . Yii::t('app', 'Times') ?>
    </span>
    <span class="badge badge-info"> 
        <?php echo Yii::t('app', 'Liked:') . ' ' . CHtml::decode($model->count_like) ?>
    </span>
    <b><h1 style="text-align: center"> <?php echo CHtml::encode($model->job_title) ?></h1></b>

    <?php echo CHtml::decode($model->content) ?>
    <span class="badge badge-success"> 
        <?php echo Yii::t('app', 'Published Date:') . ' ' . CHtml::decode($model->published_date) ?>
    </span>
    <?php
//    $this->widget('bootstrap.widgets.TbDetailView', array(
//        'data' => $model,
//        'attributes' => array(
//            'oragnization_name',
//            'job_title',
//            'job_function',
//            'job_industry',
//            array(
//                'name' => 'content',
//                'type' => 'raw'
//            ),
//            'status',
//            'created_date',
//            array(
//                'name' => 'logo_file_name',
//                'type' => 'raw',
//                'value'=>  isset($model->logo_file_name)?$model->logo_file_name:''
//            ),
//            
//            'count_view',
//            'count_like',
//            array(
//                'name' => 'published_date',
//                'type' => 'raw',
//                'value'=>  isset($model->published_date)?$model->published_date:''
//            ),
//            array(
//                'name' => 'un_published_date',
//                'type' => 'raw',
//                'value'=>  isset($model->un_published_date)?$model->un_published_date:''
//            ),
//            
//            array(
//                'name' => 'user_id',
//                'value' => ($model->user !== null) ? CHtml::link($model->user, array('/user/view', 'id' => $model->user->id)) . ' ' : null,
//                'type' => 'html',
//            ),
//        ),
//    ));
    ?>
</fieldset>