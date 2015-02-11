<?php
/** @var UserController $this */
/** @var User $model */
$this->breadcrumbs = array(
    'Users' => array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('app', 'List') . ' ' . User::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . User::label(), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'Manage') ?> <?php echo User::label(2) ?>    </legend>

    <?php echo CHtml::link('<i class="icon-search"></i> ' . Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')) ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'user-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
//        'id',
            'username',
//        'password',
            'first_name',
            'last_name',
            'user_role',
//            'telephone_no',
//            'email',
//            'last_login',
            'active',
//            array(
//                'name' => 'user_id',
//                'value' => 'isset($data->users) ? $data->users : null',
//                'filter' => CHtml::listData(User::model()->findAll(), 'id', User::representingColumn()),
//            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
            ),
        ),
    ));
    ?>
</fieldset>