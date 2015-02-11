<table class="table table-bordered" id="table">
    <thead>
        <tr>
            <th class="span1">Position Option</th>
            <th class="span5">Price/Week/Position</th>
            <th class="span2">Total Cost/week</th>
            <th class="span2">Privileged</th>            
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        $totalweeks = 0;
        foreach ($models as $model) {
            echo "<tr>"
            . "<td class='span3'>" . $model->position . "</td>"
            . "<td class='span3'>" . number_format($model->price) . "</td>"
            . "<td class='span3'>" . number_format($model->price * $model->position) . "</td>"
            . "<td class='span3'>" . $model->discount . "</td>"
            . "</tr>";
        }
        ?>
    </tbody>
</table>
<style>
    #table td{
        text-align: center;
    }
</style>