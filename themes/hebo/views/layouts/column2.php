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
                include_once('tpl_sidebar.php');
                ?>
            </div>
        </div>
    </div>
</section>
<?php
$this->endContent();
