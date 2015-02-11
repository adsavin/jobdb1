<div class="form">
    <?php
    /** @var ProvinceController $this */
    /** @var Province $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'province-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                            <?php echo $form->textFieldRow($model, 'province_name_lo', array('class' => 'span5', 'maxlength' => 45)) ?>
                    <?php echo $form->textFieldRow($model, 'province_name_en', array('class' => 'span5', 'maxlength' => 45)) ?>
                    <?php echo $form->textFieldRow($model, 'province_code', array('class' => 'span5', 'maxlength' => 5)) ?>
        <div class="row nm_row">
<label for="cvs1"><?php echo Yii::t('app', 'Cvs1'); ?></label>
<?php echo CHtml::checkBoxList('Province[cvs1]', array_map('AweHtml::getPrimaryKey', $model->cvs1),
CHtml::listData(Cv::model()->findAll(), 'id', 'name'),
array('attributeitem' => 'id', 'checkAll' => 'Select All')) ?></div>

    <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
			//'buttonType'=>'submit',
			'label'=> Yii::t('app', 'Cancel'),
			'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
		)); ?>
    </div>

<?php $this->endWidget(); ?>
</div>