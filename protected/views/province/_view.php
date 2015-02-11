<?php
/** @var ProvinceController $this */
/** @var Province $data */
?>
<div class="view">
                    
        <?php if (!empty($data->province_name_lo)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('province_name_lo')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->province_name_lo); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->province_name_en)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('province_name_en')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->province_name_en); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->province_code)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('province_code')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->province_code); ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
<hr>