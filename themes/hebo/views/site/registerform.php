<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('app', 'Register');
?>
<div class="row">
    <div class="span4 pull-right">        
        <div class="form">
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'login-form',
                'type' => 'vertical',
                'enableClientValidation' => false,
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                ),
                'focus' => array($model, 'username'),
                'htmlOptions' => array('class' => 'well'),
            ));
            ?>
            <h1><?php echo Yii::t('app', 'Register'); ?></h1>
            <?php $this->widget('RequireMessageWidget'); ?>        
            <?php echo $form->errorSummary(array($model)) ?>
            <?php
            echo $form->textField($model, 'username', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'Username'),
                'maxlength' => 50,
            ));
            ?>
            <?php
            echo $form->passwordField($model, 'password', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'Password'),
                'maxlength' => 255,
            ))
            ?>
            <?php
            echo $form->textField($model, 'first_name', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'First Name'),
                'maxlength' => 255,
            ))
            ?>
            <?php
            echo $form->textField($model, 'last_name', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'Last name'),
                'maxlength' => 255,
            ))
            ?>
            <?php
            echo $form->textField($model, 'telephone_no', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'Telephone No'),
                'maxlength' => 45,
            ))
            ?>
            <?php
            echo $form->textField($model, 'email', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'Email'),
                'maxlength' => 255,
            ))
            ?>
            <?php
            echo $form->captchaRow($model, 'captcha', array(
                'class' => 'span3',
                'maxlength' => 255,
            ))
            ?>
            <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => Yii::t('app', 'Register'),
                ));
                ?>
            </div>
            <p id="register-link">Already registered? <?php echo CHtml::link(Yii::t("app", "Login"), array("/site/login"), array()) ?></p>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>