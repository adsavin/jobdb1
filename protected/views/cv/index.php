<?php
/** @var CvController $this */
/** @var Cv $model */
$this->breadcrumbs = array(
    'Cvs',
);
$cv = Cv::model()->find("user_id = :user_id", array(":user_id" => Yii::app()->user->id));
if (isset($cv)) {
    $this->menu = array(
        array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', "id" => $cv->id)),
    );
} else {
    $this->menu = array(
        array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
    );
}
//$this->menu = array(
//    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
//    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
?>

<fieldset>
    <legend> <?php // echo Yii::t('app', 'List') ?> <?php // echo Cv::label(2) ?>    </legend>

    <?php
//    $this->widget('bootstrap.widgets.TbListView', array(
//        'dataProvider' => $dataProvider,
//        'itemView' => '_view',
//    ));
    ?>
</fieldset>