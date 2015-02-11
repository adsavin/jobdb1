<script src="<?php echo Yii::app()->baseUrl . '/ckeditor/ckeditor.js'; ?>"></script>

<div class="form">
    <?php
    /** @var CommonController $this */
    /** @var Common $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'common-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 10, 'readonly' => false)) ?>
    <?php echo $form->textFieldRow($model, 'string', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'number', array('class' => 'span5')) ?>
    <?php echo $form->datepickerRow($model, 'date_time', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7')) ?>    
    <?php // echo $form->dropDownListRow($model, 'e_num', Utils::enumItem($model, 'e_num'), array('class' => 'span1')); ?>
    <?php echo $form->textFieldRow($model, 'e_num', array('class' => 'span1', 'maxlenght' => 1)) ?>
    <?php echo $form->textAreaRow($model, 'content', array('rows' => 6, 'cols' => 50, 'class' => 'span8', "id" => 'content')) ?>

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