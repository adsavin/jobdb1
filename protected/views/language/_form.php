<div class="form">
    <?php
    /** @var LanguageController $this */
    /** @var Language $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'language-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php echo $form->textFieldRow($model, 'code', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php // echo $form->textFieldRow($model, 'used', array('class' => 'span5', 'maxlength' => 3)) ?>
    <?php echo $form->dropDownListRow($model, 'used', Utils::enumItem($model, 'used'), array('class' => 'span2')); ?>
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