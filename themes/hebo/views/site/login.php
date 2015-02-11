<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('app', 'Login');
?>
<div class="row">    
    <div class="span4">

    </div>

    <div class="span4 pull-right">        
        <?php // $this->widget('RequireMessageWidget'); ?>
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
            <h1><?php echo Yii::t('app', 'Login'); ?></h1>
            <?php echo $form->errorSummary(array($model)) ?>
            <?php
            echo $form->textField($model, 'username', array(
                'class' => 'span3',
                'prepend' => '<i class="icon-user"></i>',
                'placeholder' => Yii::t('app', 'User Name')
            ));
            ?>
            <?php
            echo $form->passwordField($model, 'password', array(
                'class' => 'span3',
                'placeholder' => Yii::t('app', 'Password'),
                'prepend' => '<i class="icon-lock"></i>',
            ));
            ?>
            <?php echo $form->checkBoxRow($model, 'rememberMe', array('class' => 'pull-right')); ?>
            <div class="form-actions">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType' => 'submit',
                    'type' => 'primary',
                    'label' => Yii::t('app', 'Login'),
//                    'htmlOptions' => array('class' => 'pull-left'),
                ));
                ?>
            </div>
            <p id="register-link">Not have an account? <?php echo CHtml::link("Register", array("/site/register"), array()) ?></p>
            <?php $this->endWidget(); ?>            
        </div>  
    </div>
</div>