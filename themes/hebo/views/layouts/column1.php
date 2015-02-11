<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <div class="container">
        <div id="content">
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
            <?php echo $content; ?>
        </div>
    </div>
</section>
<?php
$this->endContent();
