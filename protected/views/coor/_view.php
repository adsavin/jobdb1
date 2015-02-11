<?php
/** @var CoorController $this */
/** @var Coor $data */
?>
<div class="view">
    <?php if (!empty($data->province->province_name_en)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('province_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->province->province_name_en); ?>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($data->x)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('x')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->x); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($data->y)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('y')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->y); ?>
            </div>
        </div>
    <?php endif; ?>                        
</div>
<hr>