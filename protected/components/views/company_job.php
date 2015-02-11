<div class="row-fluid">
    <div class="span4">
        <?php
        $items;
        echo "<ul>";
        foreach ($companies as $company) {
            $badge = $this->widget('bootstrap.widgets.TbBadge', array(
                'type' => "important",
                'label' => count($company->jobContents),
                    ), true);
            echo "<li>";
            echo CHtml::ajaxLink($company->name . " " . $badge, // the link body (it will NOT be HTML-encoded.)
                    array('site/jobTab', "tab" => "company", "id" => $company->id), // the URL for the AJAX request. If empty, it is assumed to be the current URL.
                    array(
                        'update' => '#company_job_result',
                        'beforeSend' => 'function() {$("#company_job_result").addClass("loading");}',
                        'complete' => 'function() {$("#company_job_result").removeClass("loading");}',
                        )
            );
            echo "</li>";
        }
        echo "</ul>";
        ?>
    </div>
    <div class="span8 border-left" id="company_job_result">
        <?php echo Yii::t("app", "Please click the item on the left") ?>
    </div>
</div>