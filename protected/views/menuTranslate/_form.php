<div class="form">
    <?php
    /** @var MenuTranslateController $this */
    /** @var MenuTranslate $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
    'id' => 'menu-translate-form',
    'enableAjaxValidation' => true,
    'enableClientValidation'=> false,
    )); ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

                            <?php echo $form->textFieldRow($model, 'name', array('class' => 'span5', 'maxlength' => 255)) ?>
                        <?php echo $form->textAreaRow($model,'content',array('rows'=>6, 'cols'=>50, 'class'=>'span8')) ?>
                        <?php echo $form->dropDownListRow($model, 'language_id', CHtml::listData(Language::model()->findAll(), 'id', Language::representingColumn())) ?>
                        <?php echo $form->dropDownListRow($model, 'menu_id', CHtml::listData(Menu::model()->findAll(), 'id', Menu::representingColumn())) ?>
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