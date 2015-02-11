<h3 class="header">Hot Jobsssss
    <span class="header-line"></span> 
</h3>
<?php
$count = 0;
for ($row = 0; $row < $itemRows; $row++) :
    ?>
    <div class="row-fluid">
        <ul class="thumbnails center">
            <?php
            for ($col = 0; $col < $itemCols; $col++) :
                if ($count >= count($hotJobs) OR $count >= $limit) {
                    break;
                }
                ?>
                <li class="span3">
                    <div class="thumbnail">                        
                        <h3><?php echo CHtml::link($hotJobs[$count]->oragnization_name, array("site/ViewJobDetail", "id" => $hotJobs[$count]->id)); ?></h3>
                        <div class="round_background r-grey-light">
                            <?php // echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/uploads/images/' . $hotJobs[$count]->logo_file_name), array("site/ViewJobDetail", "id" => $hotJobs[$count]->id)); ?>
                            <?php // echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/uploads/images/home.png'), array("site/ViewJobDetail", "id" => $hotJobs[$count]->id)); ?>
                            <?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl . '/images/logos/no_image_available.jpg'), array("site/ViewJobDetail", "id" => $hotJobs[$count]->id)); ?>
                            <!--<img src="<?php // echo Yii::app()->theme->baseUrl;    ?>/img/icons/smashing/30px-01.png" alt="" class="">-->
                        </div>
                        <p><?php echo CHtml::link($hotJobs[$count]->job_title, array("site/ViewJobDetail", "id" => $hotJobs[$count]->id)); ?></p>
                    </div>
                </li>
                <?php
                $count++;
            endfor;
            ?>            
        </ul>
    </div>
    <?php
endfor;
