<?php
/** @var SiteController $this */
/** @var JobContent $model */
?>
<div class="row-fluid center">
    <?php
    if (file_exists("images/company/" . $model->company->logo) || !$model->company->logo == NULL) {
        echo CHtml::link(CHtml::image("images/company/" . $model->company->logo, $model->company->name, array(
                    "class" => "job-view-logo",
                )), array("/site/viewCompany", 'id' => $model->company_id), array(
            "class" => "",
        ));
    } else {
        echo CHtml::image("images/company/no_image_available.jpg", $model->company->name, array(
            "class" => "job-view-logo ",
        ));
    }
    ?>
</div>
<h3 class="company-job-title center">
    <?php echo $model->company->name; ?>
</h3>
<b><h4 class="company-job-title-sub center"> <?php echo CHtml::encode($model->job_title) ?></h4></b>
<div class="badge badge-important"> 
    <?php echo Yii::t('app', 'Closed Date') . ': ' . CHtml::decode($model->closed_date) ?>
</div>
<div class="pull-right badge badge-info"> 
    <?php echo CHtml::decode($model->count_like) . ' ' . Yii::t('app', 'Likes') ?>
</div>
<div class="pull-right badge badge-warning"> 
    <?php echo Yii::t('app', 'Viewed') . ': ' . CHtml::decode($model->count_view) . ' ' . Yii::t('app', 'Times') ?>
</div>

<span class="pull-right"> 
    <?php
    $this->widget("FBShareWidget", array(
        "link" => "https://www.facebook.com/FacebookDevelopers", //doing dynamically
        "width" => 1000,
    ));
    ?>
    <?php //echo Yii::t('app', 'Liked:') . ' ' . CHtml::decode($model->count_like)  ?>
    <!--        <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>-->
    <!--<div class="fb-like" data-href="<?php // CHtml::link($model["job_title"], Yii::app()->createUrl("site/ViewJobDetail", array("id" => $model->id)))                              ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>-->
</span>

<?php echo CHtml::decode($model->content) ?>
<?php
//$this->widget('bootstrap.widgets.TbButton', array(
////    'buttonType' => 'submit',
////    'type' => 'danger',
//    'label' => Yii::t('app', 'Ba'),
//));
?>
<?php
$this->widget('bootstrap.widgets.TbButton', array(
    //'buttonType'=>'submit',
    'label' => Yii::t('app', 'Back'),
    'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
));
