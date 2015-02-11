<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div class="container">
        <div class="row-fluid">
            <div class="span9">
                <?php if (isset($this->breadcrumbs) && !Yii::app()->user->isGuest): ?>
                    <div class="row-fluid">
                        <?php
                        $this->widget('zii.widgets.CBreadcrumbs', array(
                            'links' => $this->breadcrumbs,
                            'homeLink' => CHtml::link('Dashboard'),
                            'htmlOptions' => array('class' => 'breadcrumb')
                        ));
                        ?>
                    </div>
                <?php endif ?>

                <!-- Include content pages -->
                <?php echo $content; ?>
            </div><!--/span-->
            <div class="span3">
                <?php
                $this->widget("AboutUsWidget");
                $this->widget("VideoWidget", array(
                ));
                
                $this->widget("FBLikeWidget", array(
                    "link" => "https://www.facebook.com/FacebookDevelopers",
                    "height" => 100,
                    "width" => 100,
                ));
                
                $this->widget("JobByProvinceWidget", array(
                    "provinces" => Province::model()->findAll("1=1 order by id"),
                ));
                
                $this->widget("JobAlert", array(
                ));

                $widgets = Widget::model()->findAll("is_show='Yes' order by order_no");
                foreach ($widgets as $widget) {
                    $this->beginWidget("bootstrap.widgets.TbBox", array(
                        "title" => Yii::t("app", $widget->title),
                        "htmlHeaderOptions" => array(
                            "class" => "box-header"
                        ),
                    ));
                    echo $widget->content;
                    $this->endWidget();
                }
                ?>
            </div>
        </div>
        <div class="row-fluid">
            <?php
            if (Yii::app()->user->isGuest) {
                $jobList = JobContent::model()->findAll("hot_job= :hot_job", array(
                    ":hot_job" => "On",
                ));
                $this->widget('HotJobsWidget', array(
                    "itemCols" => 4,
                    "itemRows" => 4,
                    "limit" => 15,
                    "jobList" => $jobList,
                ));
            }
            ?>
        </div>
    </div>
</section>

<?php
$this->endContent();
