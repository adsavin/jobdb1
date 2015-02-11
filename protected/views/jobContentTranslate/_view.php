<?php
/** @var JobContentTranslateController $this */
/** @var JobContentTranslate $data */
?>
<div class="view">
                
        <?php if (!empty($data->tranlate)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('tranlate')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo nl2br($data->tranlate); ?>
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
    </div>
<hr>