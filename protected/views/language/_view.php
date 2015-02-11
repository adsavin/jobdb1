<?php
/** @var LanguageController $this */
/** @var Language $data */
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

    <?php if (!empty($data->used)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('used')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->used); ?>
            </div>
        </div>

    <?php endif; ?>
</div>
<hr>