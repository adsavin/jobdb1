<div class="form">
    <?php
    /** @var MenuController $this */
    /** @var Menu $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'menu-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'link', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php // echo $form->textFieldRow($model, 'show', array('class' => 'span5', 'maxlength' => 3)) ?>
    <?php echo $form->dropDownListRow($model, 'show', Utils::enumItem($model, 'show'), array('class' => 'span2')); ?>
    <?php // echo $form->textFieldRow($model, 'section', array('class' => 'span5', 'maxlength' => 6)) ?>
    <?php echo $form->dropDownListRow($model, 'section', Utils::enumItem($model, 'section'), array('class' => 'span2')); ?>
    <?php echo $form->textFieldRow($model, 'order_no', array('class' => 'span2', 'maxlength' => 5)) ?>
    <?php echo $form->textFieldRow($model, 'widget', array('class' => 'span2', 'maxlength' => 255)) ?>
    <?php echo $form->textAreaRow($model, 'content', array('id' => 'content', 'rows' => 6, 'cols' => 50, 'class' => 'span8')) ?>
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