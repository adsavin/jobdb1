<div class="row-fluid center">
    <?php
    if (file_exists("images/company/" . $model->logo) || !$model->logo == NULL) {
        echo CHtml::link(CHtml::image("images/company/" . $model->logo, $model->name, array(
                    "class" => "job-view-logo",
                )), array("/site/viewCompany", 'id' => $model->id), array(
            "class" => "",
        ));
    } else {
        echo CHtml::image("images/company/no_image_available.jpg", $model->name, array(
            "class" => "job-view-logo ",
        ));
    }
    ?>
</div>
<h3 class="company-job-title center">
    <?php echo $model->name; ?>
</h3>
<p class="center"><?php echo Yii::t("app", "Tel") . ": " . $model->telelphone; ?></p>
<p class="center"><?php echo Yii::t("app", "Email") . ": " . $model->email; ?></p>
<h3 class="header"><?php echo Yii::t("app", "Available Jobs") ?>:
    <span class="header-line"></span> 
</h3>
<?php
$dataProvider = new CArrayDataProvider($model->jobContents, array(
    "pagination" => FALSE,
));
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view_job',
    "summaryText" => FALSE,
    "htmlOptions" => array(
//        "class" => "span8"
    )
));