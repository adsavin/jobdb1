<?php
/** @var CvController $this */
/** @var Cv $data */
?>
<div class="view">
                    
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
                
        <?php if (!empty($data->surname)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->surname); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->birthdate)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo Yii::app()->getDateFormatter()->formatDateTime($data->birthdate, 'medium', 'medium'); ?>
            <br/>
                 <?php echo date('D, d M y H:i:s', strtotime($data->birthdate)); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->contact_number)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('contact_number')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->contact_number); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->email)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::mailto($data->email); ?>
                            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->district)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('district')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->district); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->major)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('major')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->major); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->graduated_year)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('graduated_year')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->graduated_year); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->language)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->language); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->language_level)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('language_level')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->language_level); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->experience)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('experience')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->experience); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->job_function_year)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('job_function_year')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->job_function_year); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->computer_skill)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('computer_skill')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->computer_skill); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->salary_min)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('salary_min')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->salary_min); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->salary_max)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('salary_max')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->salary_max); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->country->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->country->name); ?>
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
                
        <?php if (!empty($data->nationality->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nationality_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->nationality->name); ?>
            </div>
        </div>

        <?php endif; ?>
                
        <?php if (!empty($data->highestEduLevel->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('highest_edu_level_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->highestEduLevel->name); ?>
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
                
        <?php if (!empty($data->graduatedCountry->name)): ?>
        <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('graduated_country_id')); ?>:</b>
            </div>
            <div class="field_value">
                <?php echo CHtml::encode($data->graduatedCountry->name); ?>
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
    </div>
<hr>