<?php
/** @var MenuTranslateController $this */
/** @var MenuTranslate $data */
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
                
        <?php if (!empty($data->language->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('language_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->language->name); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->menu->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('menu_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->menu->name); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
<hr>