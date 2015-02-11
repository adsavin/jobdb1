<?php
/** @var UserController $this */
/** @var User $data */
?>
<div class="view">
                    
        <?php if (!empty($data->username)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->username); ?>
            </div>
        </div>

        <?php endif; ?>
                    
        <?php if (!empty($data->first_name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->first_name); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->last_name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->last_name); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->user_role)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_role')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->user_role); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->telephone_no)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('telephone_no')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->telephone_no); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->email)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::mailto($data->email); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->last_login)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->last_login, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->last_login)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->active)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->active); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->companies->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->companies->name); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
<hr>