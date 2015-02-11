<?php
/** @var CommonController $this */
/** @var Common $data */
?>
<div class="view">

    <?php if (!empty($data->code)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->code); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->string)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('string')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->string); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->number)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('number')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->number); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->date_time)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('date_time')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->date_time, 'medium', 'medium'); ?>
                <br/>
                <?php echo date('D, d M y H:i:s', strtotime($data->date_time)); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->content)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->content); ?>
            </div>
        </div>

    <?php endif; ?>
</div>
<hr>