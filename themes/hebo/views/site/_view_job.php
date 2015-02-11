<div id="job-item" class="item">    
    <div class="row-fluid">
        <div class="span2">
            <?php echo CHtml::image("images/company/".$data->company->logo,$data->company->name, array(
                "class" => "span10",
            ) ) ?>
        </div>
        <div class="span8">
            <?php echo Yii::t("app", "Title"); ?>:
            <b><i><?php echo CHtml::link(CHtml::encode($data->job_title), array("site/viewJobDetail", "id" => $data->id)); ?></i></b>
            <br />
            <?php echo Yii::t("app", "Company"); ?>:
            <b><i><?php echo CHtml::encode($data->company->name); ?></i></b>
            <br />

            <?php echo Yii::t("app", "Function"); ?>:
            <b><i><?php echo CHtml::encode($data->jobFunction->job_function_name); ?></i></b>
            <br />   

            <?php echo Yii::t("app", "Province"); ?>:
            <b><i><?php echo isset($data->province)?CHtml::encode($data->province->province_name_en):Yii::t("app", "All Province"); ?></i></b>
            <br />

            <?php echo Yii::t("app", "Type"); ?>:
            <b><i><?php echo CHtml::encode($data->jobType->type_description_en); ?></i></b>
            <br />

            <?php echo Yii::t("app", "Closed Date"); ?>:
            <b><i><?php echo CHtml::encode($data->closed_date); ?></i></b>
            <br />
        </div>
    </div>
</div>