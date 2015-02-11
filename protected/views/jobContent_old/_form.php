

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

    <?php $this->widget('RequireMessageWidget'); ?>

    <?php echo $form->errorSummary(array($model)) ?>
    <?php echo $form->textFieldRow($model, 'job_title', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'oragnization_name', array('class' => 'span5', 'maxlength' => 255)) ?>

    <?php // echo $form->textFieldRow($model, 'job_function', array('class' => 'span5', 'maxlength' => 255)) ?>
    
    <?php // echo $form->textFieldRow($model, 'job_industry', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textAreaRow($model, 'content', array('id' => 'editor1', 'rows' => 6, 'cols' => 50, 'class' => 'span8')) ?>



    <?php
    //ckeditor
//        echo $form->ckEditorRow($model, 'content', array(
//        'options'=>array(
//                    'fullpage'=>'js:true', 
//                    'width'=>'100%', 
//                    'height'=>'600',
//                    'filebrowserImageBrowseUrl'=> Yii::app()->baseUrl . '/upload/kcfinder/browse.php?type=images',
//                    'filebrowserBrowseUrl' => Yii::app()->baseUrl . '/upload/kcfinder/browse.php?type=files',
// 
// 
//                    'resize_maxWidth'=>'740',
//                    'resize_minWidth'=>'320',
//                    'toolbar'=>'js:[
//                      ["Source","DocProps","-","PasteText","PasteFromWord"],
//                      ["Undo","Redo","-","RemoveFormat"],
//                      ["Bold","Italic","Underline","Strike","Subscript","Superscript"],
//                      ["NumberedList","BulletedList","-","Outdent","Indent"],
//                      ["JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock"],
//                      ["Link","Unlink"],
//                      ["Image","Flash","Table","HorizontalRule","SpecialChar"],
//                      ["Format","Font","FontSize","Styles"],
//                      ["TextColor","BGColor"],
//                      ["Maximize","ShowBlocks"],
//                      ["BidiLtr", "BidiRtl"],
//                    ],')
//        ));
    ?>

    <?php echo $form->dropDownListRow($model, 'status', Utils::enumItem($model, 'status'), array('class' => 'span5')); ?>
    <?php echo $form->dropDownListRow($model, 'hot_job', Utils::enumItem($model, 'hot_job'), array('class' => 'span5')); ?>
    <?php echo $form->fileFieldRow($model, 'logo_file_name'); ?>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'icon' => 'icon-hdd',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'warning',
            'icon' => 'icon-list',
            'label' => Yii::t('app', 'Cancel'),
            'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

<!--<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>-->

<script type="text/javascript">
    CKEDITOR.replace('editor1', {
        filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
        filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
        filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
        filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
        filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
        filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash'
    });
</script>