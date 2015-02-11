<?php
/** @var InvoiceController $this */
/** @var Invoice $data */
?>
<div class="view">
                    
        <?php if (!empty($data->no)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('no')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->no); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->created_date)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->created_date, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->created_date)); ?>
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
                
        <?php if (!empty($data->payment_status)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('payment_status')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->payment_status); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->discount)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->discount); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->total)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->total); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->company->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->company->name); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
<hr>