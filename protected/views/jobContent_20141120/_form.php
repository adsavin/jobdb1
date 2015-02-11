<script src="<?php echo Yii::app()->baseUrl . '/ckeditor/ckeditor.js'; ?>"></script>

<div class="form">
    <?php
    /** @var JobContentController $this */
    /** @var JobContent $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'job-content-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>

    <!--<p class="note">-->
        <!--//<?php // echo Yii::t('app', 'Fields with')  ?> <span class="required">*</span>-->
    <?php // echo Yii::t('app', 'are required') ?>
    <!--.    </p>-->
    <?php $this->widget('RequireMessageWidget'); ?>
    <?php echo $form->errorSummary(array($model)) ?>

    <?php // echo $form->textFieldRow($model, 'job_reference_number', array('class' => 'span5', 'maxlength' => 45)) ?>
    <?php echo $form->textFieldRow($model, 'oragnization_name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'job_title', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textAreaRow($model, 'content', array('id'=> 'content','rows' => 6, 'cols' => 50, 'class' => 'span8')) ?>
    <?php // echo $form->textFieldRow($model, 'status', array('class' => 'span5', 'maxlength' => 12)) ?>
    <?php echo $form->dropDownListRow($model, 'status', Utils::enumItem($model, 'status'), array('class' => 'span3')); ?>
    <?php // echo $form->textFieldRow($model, 'created_date', array('class' => 'span5')) ?>
    <?php // echo $form->textFieldRow($model, 'logo_file_name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php // echo $form->textFieldRow($model, 'count_view', array('class' => 'span5')) ?>
    <?php // echo $form->textFieldRow($model, 'count_like', array('class' => 'span5')) ?>
    <?php echo $form->datepickerRow($model, 'published_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7')) ?>
    <?php echo $form->datepickerRow($model, 'un_published_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7')) ?>
    <?php echo $form->datepickerRow($model, 'closed_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7')) ?>
    <?php // echo $form->textFieldRow($model, 'hot_job', array('class' => 'span5', 'maxlength' => 3)) ?>
    <?php echo $form->dropDownListRow($model, 'hot_job', Utils::enumItem($model, 'hot_job'), array('class' => 'span2')); ?>
    <?php echo $form->fileFieldRow($model, 'logo_file_name'); ?>
    <?php // echo $form->fileFieldRow($model, 'thumbnail', array('class' => 'span4', 'maxlength' => 255)); ?></br>
    <?php // echo!$model->isNewRecord ? CHtml::image(Yii::app()->baseUrl . "/uploads/thumbnails/" . $model->thumbnail, $model->translateTitle(), array("style" => "width: 100px;", "id" => "preview_img")) : ""; ?>
    <?php echo CHtml::image(Yii::app()->baseUrl . "/images/logos/" . $model->logo_file_name, '', array("style" => "width: 100px;", "id" => "preview_img")); ?>
    <?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn())) ?>
    <?php // echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())) ?>
    <?php echo $form->dropDownListRow($model, 'job_industry_id', CHtml::listData(JobIndustry::model()->findAll(), 'id', JobIndustry::representingColumn())) ?>
    <?php echo $form->dropDownListRow($model, 'job_function_id', CHtml::listData(JobFunction::model()->findAll(), 'id', JobFunction::representingColumn())) ?>
    <?php echo $form->dropDownListRow($model, 'job_type_id', CHtml::listData(JobType::model()->findAll(), 'id', JobType::representingColumn())) ?>
    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            //'buttonType'=>'submit',
            'label' => Yii::t('app', 'Cancel'),
            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
    });
</script>
<?php
Yii::app()->clientScript->registerScript('preview_image', 'function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#preview_img").attr("src", e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#JobContent_logo_file_name").change(function(){
    readURL(this);
});'
);