<div class="form">
    <?php
    /** @var PublishController $this */
    /** @var Publish $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'publish-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>    
    <?php $this->widget('RequireMessageWidget'); ?>
    <?php echo $form->errorSummary(array($model)) ?>

    <?php
    echo $form->dropDownListRow($model, 'job_content_id', CHtml::listData(JobContent::model()->findAll(), 'id', JobContent::representingColumn()), array(
        "readonly" => true,
    ));
    ?>
    <?php // echo $form->textFieldRow($model, 'start_date', array('class' => 'span5')) ?>
    <?php echo $form->datepickerRow($model, 'start_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7', "options" => array("format" => "yyyy-mm-dd", "weekStart" => 1, "viewFormat" => "dd/mm/yyyy"))) ?>
    <?php // echo $form->textFieldRow($model, 'end_date', array('class' => 'span5'))  ?>
    <?php echo $form->datepickerRow($model, 'end_date', array('prepend' => '<i class="icon-calendar"></i>', 'class' => 'span7', "options" => array("format" => "yyyy-mm-dd", "weekStart" => 1, "viewFormat" => "dd/mm/yyyy"))) ?>

    <?php // echo $form->textFieldRow($model, 'payment_status', array('class' => 'span5', 'maxlength' => 9)) ?>
    <?php
    if (!$model->isNewRecord) {
        echo $form->dropDownListRow($model, 'payment_status', Utils::enumItem($model, 'payment_status'), array('class' => 'span2'));
    }
    ?>
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
    $("option[value=<?= $job->id ?>]").prop("selected", true);
</script>