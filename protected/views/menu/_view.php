<?php
/** @var MenuController $this */
/** @var Menu $data */
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

    <?php if (!empty($data->link)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo AweHtml::formatUrl($data->link, true); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->show)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('show')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->show); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->section)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('section')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->section); ?>
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