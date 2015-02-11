<?php
/** @var JobContentController $this */
/** @var JobContent $data */
?>
<div class="view">

    <?php if (!empty($data->job_reference_number)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('job_reference_number')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->job_reference_number); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->job_title)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('job_title')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->job_title); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->content)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo nl2br($data->content); ?>
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

    <?php if (!empty($data->count_view)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('count_view')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->count_view); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->count_like)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('count_like')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->count_like); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->closed_date)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('closed_date')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->closed_date, 'medium', 'medium'); ?>
                <br/>
                <?php echo date('D, d M y H:i:s', strtotime($data->closed_date)); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->hot_job)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('hot_job')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->hot_job); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->province->province_name_lo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('province_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->province->province_name_lo); ?>
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

    <?php if (!empty($data->jobFunction->job_function_name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('job_function_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->jobFunction->job_function_name); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->jobType->type_description_en)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('job_type_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->jobType->type_description_en); ?>
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