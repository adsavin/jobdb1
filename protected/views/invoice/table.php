<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th class="span1">No.</th>
            <th class="span5">Title</th>
            <th class="span2">Start Date</th>
            <th class="span2">End Date</th>
            <th class="span2">Week(s)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $totalweeks = 0;
        foreach ($model->publishes as $publish) {
            $totalweeks += ceil(date_diff(date_create($publish->start_date), date_create($publish->end_date))->format("%a") / 7);
            echo "<tr>"
            . "<td class='center'>" . ++$i . "</td>"
            . "<td>" . $publish->jobContent->job_title . "</td>"
            . "<td class='center'>" . date_format(date_create($publish->start_date), "d/m/Y") . "</td>"
            . "<td class='center'>" . date_format(date_create($publish->end_date), "d/m/Y") . "</td>"
            . "<td class='right'>" . ceil(date_diff(date_create($publish->start_date), date_create($publish->end_date))->format("%a") / 7) . "</td>"
            . "</tr>";
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" class="right"><?= Yii::t("app", "Total Weeks") ?>:</th>
            <th class="right"><?= number_format($totalweeks) ?></th>
        </tr>
        <tr>
            <th colspan="4" class="right"><?= Yii::t("app", "Total") ?>:</th>
            <th class="right"><?= number_format($model->total + $model->discount) ?></th>
        </tr>
        <tr>
            <th colspan="4" class="right"><?= Yii::t("app", "Discount") ?>:</th>
            <th class="right"><?= number_format($model->discount) ?></th>
        </tr>
        <tr>
            <th colspan="4" class="right"><?= Yii::t("app", "Total") ?>:</th>
            <th class="right"><?= number_format($model->total) ?></th>
        </tr>
    </tfoot>
</table>