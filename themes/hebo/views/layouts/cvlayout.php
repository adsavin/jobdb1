<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div class="container">
        <div class="row-fluid">
            <div class="span10">
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
            </div>
            <div class="span2">
                <?php
                $this->beginWidget("bootstrap.widgets.TbBox", array(
                    "title" => Yii::t("app", "Menu"),
                    "htmlOptions" => array(
                        
                    ),
                ));
                $this->widget('bootstrap.widgets.TbButton', array(
                    //'buttonType'=>'submit',
                    "type" => "primary",
                    'label' => Yii::t('app', 'Post CV'),
                    "url" => array("cv/index"),
                    'htmlOptions' => array(
                        "class" => "span12",
//                        "style" => "position: fixed",
                    ),
                ));
                $this->endWidget();
                ?>
            </div>
        </div>
    </div>
</section>
<?php
$this->endContent();
