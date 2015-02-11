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
                if (Yii::app()->user->isGuest) {
                    $this->widget("AboutUsWidget");
                }
                ?>

                <?php
                $this->widget("VideoWidget", array(
                ));
                ?>
                
                <?php
                $this->widget("FBLikeWidget", array(
                    "link" => "https://www.facebook.com/FacebookDevelopers",
                    "height" => 100,
                    "width" => 100,
                ));
                ?>
                <?php
                $this->widget("JobByProvinceWidget", array(
                    "provinces" => Province::model()->findAll("1=1 order by id"),
                ));

                $this->widget("JobAlert", array(
                ));

//                $this->widget("HotJobsListWidget", array(
//                    "limit" => 5,
//                ));

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
    </div>
</section>

<?php
$this->endContent();
