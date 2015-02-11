<?php if (Yii::app()->user->isGuest): ?>
    <div class="row-fluid">
        <?php
        $this->widget("JobByIndustryWidget", array(
            "id" => "companyLogos",
        ));
        ?>
        <?php
        $this->widget("bootstrap.widgets.TbTabs", array(
            "id" => "tabs",
            "type" => "tabs",
            "tabs" => array(
                array("label" => Yii::t("app", "New Jobs"),
                    "content" => $this->widget('PublishedJobContentWidget', array(
                        "controller" => $this,
                            ), true),
                    "active" => true),
                array("label" => Yii::t("app", "Company"), "content" => $this->widget("CompanyJobWidget", array(), true)),
                array("label" => Yii::t("app", "Function"), "content" => $this->widget("FunctionJobWidget", array(), true)),
                array("label" => Yii::t("app", "Province"), "content" => $this->widget("ProvinceJobWidget", array("provinces" => $provinces), true)),
            ),
        ));
        ?>
    </div>
    <?php
else :
    $this->widget("DashboardWidget");
endif;