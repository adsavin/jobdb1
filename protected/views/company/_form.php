<div class="form">
    <?php
    /** @var CompanyController $this */
    /** @var Company $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'company-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data',
        ),
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php // echo $form->textFieldRow($model, 'id', array('class' => 'span5')) ?>
    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php // echo $form->textFieldRow($model, 'logo', array('class' => 'span5', 'maxlength' => 255)) ?>    
    <?php echo $form->fileFieldRow($model, 'logo', array('class' => 'span5', 'maxlength' => 255)); ?>
    <?php
    echo CHtml::image(Yii::app()->baseUrl . "/images/company/" . $model->logo, '', array(
        "style" => "width: 100px;",
        "id" => "preview_logo",
    ));
    ?>
    <?php echo $form->textFieldRow($model, 'telelphone', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textAreaRow($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'span8')) ?>
    <?php // echo $form->textFieldRow($model, 'status', array('class' => 'span5', 'maxlength' => 9)) ?>
    <?php echo $form->dropDownListRow($model, 'status', Utils::enumItem($model, 'status'), array('class' => 'span3')); ?>
    <?php // echo $form->textFieldRow($model, 'registered_date', array('class' => 'span5')) ?>
    <?php // echo $form->textFieldRow($model, 'last_updated', array('class' => 'span5'))  ?>
    <?php // echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())) ?>
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
<?php
Yii::app()->clientScript->registerScript('preview_image', 'function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#preview_logo").attr("src", e.target.result);
            $("#Company_logo_em_").text("");
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#Company_logo").change(function(){
    readURL(this);
});'
);
