<h3 class="header">Hot Jobs
    <span class="header-line"></span> 
</h3>

<div class="row-fluid">
    <ul class="list-icon">
        <?php for ($index = 0; $index < $limit; $index++) { ?>            
        <li><?php echo CHtml::link($jobList[$index]->job_title, array("site/viewJobDetail", "id" => $jobList[$index]->id)) ?></li>
        <?php } ?>
    </ul>
</div>