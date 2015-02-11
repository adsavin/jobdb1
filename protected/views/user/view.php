<?php
/** @var UserController $this */
/** @var User $model */
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id,
);

$this->menu=array(
    //array('label' => Yii::t('app', 'List') . ' ' . User::label(2), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('app', 'Create') . ' ' . User::label(), 'icon' => 'plus', 'url' => array('create')),
	array('label' => Yii::t('app', 'Update'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' => Yii::t('app', 'Delete'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'))),
    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
);
?>

<fieldset>
    <legend><?php echo Yii::t('app', 'View') . ' ' . User::label(); ?> <?php echo CHtml::encode($model) ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data' => $model,
	'attributes' => array(
        'id',
        'username',
        'password',
        'first_name',
        'last_name',
        'user_role',
        'telephone_no',
        array(
                'name'=>'email',
                'type'=>'email'
            ),
        'last_login',
        'active',
        array(
			'name'=>'user_id',
			'value'=>($model->user !== null) ? CHtml::link($model->user, array('/user/view', 'id' => $model->user->id)).' ' : null,
			'type'=>'html',
		),
	),
)); ?>
</fieldset>