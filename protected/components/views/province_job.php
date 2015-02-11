<div class="row-fluid">
    <div class="span4">
        <!--<div class="list-group">-->
            <?php
            $items;
//            echo "<ul>";
            foreach ($provinces as $province) {
                $badge = $this->widget('bootstrap.widgets.TbBadge', array(
                    'type' => "important",
                    'label' => count($province->jobContents),
                        ), true);
//                echo "<li class='item'>";
                echo "<div class='item'>";
                echo CHtml::ajaxLink($province->province_name_en . " " . $badge, // the link body (it will NOT be HTML-encoded.)
                        array('site/jobTab', "tab" => "province", "id" => $province->id), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                        array('update' => '#province_job_result')
                );                
//                echo "</li>";
                echo "</div>";
                
            }
//            echo "</ul>";

//            foreach ($provinces as $province) {
//                $badge = $this->widget('bootstrap.widgets.TbBadge', array(
//                    'type' => "important",
//                    'label' => count($province->jobContents),
//                        ), true);
//                echo "<li>";
//                echo CHtml::ajaxLink($province->province_name_en . " " . $badge, // the link body (it will NOT be HTML-encoded.)
//                        array('site/jobTab', "tab" => "province", "id" => $province->id), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
//                        array('update' => '#province_job_result'), array("class" => "list-group-item")
//                );
//                echo "</li>";
//            }
            ?>
        <!--</div>-->
    </div>
    <div class="span8 border-left" id="province_job_result">
        <?php echo Yii::t("app", "Please click the item on the left") ?>
    </div>
</div>