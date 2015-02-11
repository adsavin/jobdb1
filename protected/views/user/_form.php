<div class="form">
    <?php
    /** @var UserController $this */
    /** @var User $model */
    /** @var AweActiveForm $form */
    $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => true,
        'enableClientValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with') ?> <span class="required">*</span>
        <?php echo Yii::t('app', 'are required') ?>.    </p>

    <?php echo $form->errorSummary($model) ?>

    <?php echo $form->textFieldRow($model, 'username', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'first_name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->textFieldRow($model, 'last_name', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php // echo $form->textFieldRow($model, 'user_role', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php echo $form->dropDownListRow($model, 'user_role', CHtml::listData($userRoles, 'name', 'name')) ?>
    <?php echo $form->textFieldRow($model, 'telephone_no', array('class' => 'span5', 'maxlength' => 45)) ?>
    <?php echo $form->textFieldRow($model, 'email', array('class' => 'span5', 'maxlength' => 255)) ?>
    <?php // echo $form->textFieldRow($model, 'last_login', array('class' => 'span5')) ?>
    <?php // echo $form->textFieldRow($model, 'active', array('class' => 'span5', 'maxlength' => 3)) ?>
    <?php echo $form->dropDownListRow($model, 'active', Utils::enumItem($model, "active")) ?>
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