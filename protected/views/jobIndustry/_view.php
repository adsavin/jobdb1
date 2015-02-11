<?php
/** @var JobIndustryController $this */
/** @var JobIndustry $data */
?>
<div class="view">

    <?php if (!empty($data->job_industry_name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('job_industry_name')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->job_industry_name); ?>
            </div>
        </div>

    <?php endif; ?>

    <?php if (!empty($data->image)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
            </div>
            <div class="field_value">
                <img alt="<?php echo $data ?>" title="<?php echo $data ?>" src="<?php echo $data->image; ?>" />
            </div>
        </div>

    <?php endif; ?>
</div>
<hr>