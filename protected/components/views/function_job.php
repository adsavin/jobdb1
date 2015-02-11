<div class="row-fluid">
    <div class="span4">
        <?php
        $items;
        echo "<ul>";
        foreach ($functions as $function) {
            echo "<li>";
            $badge = $this->widget('bootstrap.widgets.TbBadge', array(
                'type' => "important",
                'label' => count($function->jobContents),
                    ), true);
            echo CHtml::ajaxLink($function->job_function_name . " " . $badge, // the link body (it will NOT be HTML-encoded.)
                    array('site/jobTab', "tab" => "function", "id" => $function->id), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                    array('update' => '#function_job_result')
            );
            echo "</li>";
        }
        echo "</ul>";
        ?>
    </div>
    <div class="span8 border-left" id="function_job_result">
        <?php echo Yii::t("app", "Please click the item on the left") ?>
    </div>
</div>