<?php
/** @var CompanyController $this */
/** @var Company $data */
?>
<div class="view">
                    
        <?php if (!empty($data->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->name); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->logo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->logo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->status)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->status); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->address)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->address); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->telelphone)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('telelphone')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->telelphone); ?>
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
                
        <?php if (!empty($data->registered_date)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('registered_date')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->registered_date, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->registered_date)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->last_updated)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('last_updated')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->last_updated, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->last_updated)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->user->username)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->user->username); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
<hr>