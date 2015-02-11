<div class="form">
    <?php
    /** @var CvController $this */
    /** @var Cv $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'cv-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
        "htmlOptions" => array(
            'enctype' => 'multipart/form-data',
            'method' => "post",
        ),
    ));
    ?>

    <?php $this->widget('RequireMessageWidget'); ?>
    <?php echo $form->errorSummary(array($model)) ?>
    <div class="row">
        <div class="span5">
            <?php echo $form->fileFieldRow($model, 'photo', array('class' => 'span5', 'maxlength' => 255)); ?>
            <?php
            echo CHtml::image(Yii::app()->params["cvProfileDir"] . $model->photo, '', array(
                "style" => "width: 100px;",
                "id" => "preview_photo",
            ));
            ?>
            <?php echo $form->textFieldRow($model, 'title', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'name', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'surname', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->datepickerRow($model, 'birthdate', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span2', "options" => array("format" => "yyyy-mm-dd", "weekStart" => 1, "viewFormat" => "dd/mm/yyyy"))) ?>
            <?php echo $form->textFieldRow($model, 'contact_number', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'email', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'district', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn())) ?>
            <?php echo $form->dropDownListRow($model, 'country_id', CHtml::listData(Country::model()->findAll(), 'id', Country::representingColumn())) ?>            
            <?php echo $form->dropDownListRow($model, 'nationality_id', CHtml::listData(Nationality::model()->findAll(), 'id', Nationality::representingColumn())) ?>
            <?php echo $form->dropDownListRow($model, 'highest_edu_level_id', CHtml::listData(HighestEduLevel::model()->findAll(), 'id', HighestEduLevel::representingColumn())) ?>            
            <?php echo $form->textFieldRow($model, 'major', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->dropDownListRow($model, 'graduated_country_id', CHtml::listData(Country::model()->findAll(), 'id', Country::representingColumn())) ?>                        
        </div>
        <div class="span4">
            <?php echo $form->textFieldRow($model, 'graduated_year', array('class' => 'span1')) ?>
            <?php echo $form->textFieldRow($model, 'language', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'language_level', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'experience', array('class' => 'span1')) ?>
            <?php echo $form->textFieldRow($model, 'job_function_year', array('class' => 'span1')) ?>
            <?php echo $form->textFieldRow($model, 'computer_skill', array('class' => 'span4', 'maxlength' => 255)) ?>
            <?php echo $form->textFieldRow($model, 'salary_min', array('class' => 'span4')) ?>
            <?php echo $form->textFieldRow($model, 'salary_max', array('class' => 'span4')) ?>


            <?php // echo $form->dropDownListRow($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', User::representingColumn())) ?>

            <div class="row-fluid">
                <div class="span5">
                    <label class="checkbox-inline" for="jobFunctions"><?php echo Yii::t('app', 'Major work function'); ?></label>
                    <?php
                    echo CHtml::checkBoxList('Cv[jobFunctions]', array_map('AweHtml::getPrimaryKey', $model->jobFunctions), CHtml::listData(JobFunction::model()->findAll(), 'id', 'job_function_name'), array(
                        'attributeitem' => 'id',
                        'checkAll' => 'Select All',
//                        "class" => "checkbox-inline",
                    ));
                    ?>
                </div>

                <div class="span7">
                    <label for="provinces"><?php echo Yii::t('app', 'Where wolud you like to work'); ?></label>
                    <?php
                    echo CHtml::checkBoxList('Cv[provinces]', array_map('AweHtml::getPrimaryKey', $model->provinces), CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn()), array('attributeitem' => 'id', 'checkAll' => 'Select All'))
                    ?>
                </div>
            </div>
            <label for="cvAttachFiles"><?php echo Yii::t('app', 'Attached Files'); ?></label>
            <?php
            $this->widget('CMultiFileUpload', array(
                'model' => $model,
                'name' => 'cvAttachFiles',
                'accept' => 'jpg|png|pdf|doc|docx|xls|xlsx|ppt|pptx|txt',
                'max' => 10,
                'remove' => "[x]",
                'denied' => Yii::t("app", "This file type is not support!!!"), //message that is displayed when a file type is not allowed
                'duplicate' => Yii::t("app", "Duplicated File!!!"), //message that is displayed when a file appears twice
                'htmlOptions' => array('size' => 25),
            ));
            ?>
            <ul>
                <?php foreach ($this->findFiles() as $filename): ?>
                    <li><?php echo CHtml::link($filename, Yii::app()->params['cvAttacheDir'] . $filename, array('rel' => 'external')); ?></li>
                <?php endforeach; ?>
            </ul>
            <?php echo $form->dropDownListRow($model, 'status', Utils::enumItem($model, 'status'), array('class' => 'span2')); ?>
        </div>
    </div>
    <div class="form-actions">
        <?php
        if (Yii::app()->user->checkAccess("Web Master")) {
            switch ($model->is_lock) {
                case "Y":
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'danger',
                        'label' => Yii::t('app', 'UnLock'),
                        'url' => array("lock", "id" => $model->id, "lock" => "N"),
                        'icon' => 'lock',
                    ));
                    break;
                case "N":
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'danger',
                        'label' => Yii::t('app', 'Lock'),
                        'url' => array("lock", "id" => $model->id, "lock" => "Y"),
                        'icon' => 'lock',
                    ));
                    break;

                default:
                    break;
            }
        }
        ?>
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
            $("#preview_photo").attr("src", e.target.result);
//            $("#Company_logo_em_").text("");
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#Cv_photo").change(function(){
    readURL(this);
});'
);
