<?php
/** @var PublishController $this */
/** @var Publish $data */
?>
<div class="view">
                
        <?php if (!empty($data->start_date)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->start_date, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->start_date)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->end_date)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->end_date, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->end_date)); ?>
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
    </div>
<hr>