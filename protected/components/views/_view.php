<?php
$image = Yii::app()->baseUrl . "/images/company/";
if (isset($hotJobs[$count]->company) && file_exists($hotJobs[$count]->company->imageFullPath)) {
    $image .= $hotJobs[$count]->company->logo;
} else {
    $image .= "no_image_available.jpg";
}
echo CHtml::link(CHtml::image($image, "", array(
            "style" => "width:100px;height:80px;",
            "class" => "span-1 thumbnail",
        )), Yii::app()->createUrl("site/ViewJobDetail", array(
            "id" => $hotJobs[$count]->id
        )), array(
//                        "target" => "_blank",
    "class" => "hotjob-thumbnail",
));
?>
<p class="hotjob-list-header">
    <?php
    $limitString = 20;
    echo CHtml::link(strlen($hotJobs[$count]->company->name) > $limitString ? substr($hotJobs[$count]->company->name, 0, $limitString) . "..." : $hotJobs[$count]->company->name, Yii::app()->createUrl("site/ViewJobDetail", array(
                "id" => $hotJobs[$count]->id
            )), array(
//                            "target" => "_blank",
        "class" => "",
    ));
    ?>
</p>
<p class="hotjob-list-body">- 
    <?php echo strlen($hotJobs[$count]->job_title) > $limitString ? substr($hotJobs[$count]->job_title, 0, $limitString) . "..." : $hotJobs[$count]->job_title; ?>
</p>
<p class="hotjob-list-body">- 
    <?php echo strlen($hotJobs[$count]->jobType) > $limitString ? substr($hotJobs[$count]->jobType->type_description_en, 0, $limitString) . "..." : $hotJobs[$count]->jobType->type_description_en; ?>
</p>
<p class="hotjob-list-body">
    <?php
    echo Yii::t("app", "Deadline") . ": ";
    echo strlen($hotJobs[$count]->closed_date) > $limitString ? substr($hotJobs[$count]->closed_date, 0, $limitString) . "..." : $hotJobs[$count]->closed_date;
    ?>
</p>