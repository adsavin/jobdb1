<div class="form">
    <?php
    /** @var QuatationController $this */
    /** @var Quatation $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'quatation-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($model) ?>

    <?php echo $form->textFieldRow($model, 'position', array('class' => 'span1')) ?>
    <?php echo $form->textFieldRow($model, 'price', array('class' => 'span2')) ?>
    <?php echo $form->textFieldRow($model, 'discount', array('class' => 'span1')) ?>
    <?php echo $form->textFieldRow($model, 'remark', array('class' => 'span5', 'maxlength' => 255)) ?>
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
<script>
$("#Quatation_position").focus();
</script>