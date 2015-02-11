<div class="form">
    <?php
    /** @var JobContentController $this */
    /** @var JobContent $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'job-content-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>

    <?php $this->widget('RequireMessageWidget'); ?>
    <?php echo $form->errorSummary(array($model)) ?>

    <?php // echo $form->textFieldRow($model, 'job_reference_number', array('class' => 'span5', 'maxlength' => 45)) ?>
    <?php echo $form->dropDownListRow($model, 'company_id', CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn())) ?>
    <?php echo $form->textFieldRow($model, 'job_title', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->dropDownListRow($model, 'job_function_id', CHtml::listData(JobFunction::model()->findAll(), 'id', JobFunction::representingColumn())) ?>
    <?php echo $form->dropDownListRow($model, 'job_type_id', CHtml::listData(JobType::model()->findAll(), 'id', JobType::representingColumn())) ?>
    <?php echo $form->dropDownListRow($model, 'hot_job', Utils::enumItem($model, 'hot_job'), array('class' => 'span2')); ?>
    <?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn()), array(
        "prompt" => "All Province"
    )) ?>    
    <?php echo $form->textAreaRow($model, 'content', array('id' => 'content', 'rows' => 6, 'cols' => 50, 'class' => 'span8')) ?>
    <?php echo $form->dropDownListRow($model, 'status', Utils::enumItem($model, 'status'), array('class' => 'span2')); ?>
    <?php echo $form->datepickerRow($model, 'closed_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7', "options" => array("format" => "yyyy-mm-dd", "weekStart" => 1, "viewFormat" => "dd/mm/yyyy"))) ?>

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

<script src="<?php echo Yii::app()->baseUrl . '/ckeditor/ckeditor.js'; ?>"></script>
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