<?php
/** @var WidgetController $this */
/** @var Widget $data */
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

    <?php if (!empty($data->title)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->title); ?>
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

    <?php if (!empty($data->order_no)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('order_no')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->order_no); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->is_show)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('is_show')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->is_show); ?>
            </div>
        </div>

    <?php endif; ?>
</div>
<hr>