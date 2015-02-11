<?php
/** @var InvoiceController $this */
/** @var Invoice $model */
$this->breadcrumbs = array(
    'Invoices',
);

//$this->menu = array(
//    array('label' => Yii::t('app', 'Create'), 'icon' => 'plus', 'url' => array('create')),
//    array('label' => Yii::t('app', 'Manage'), 'icon' => 'list-alt', 'url' => array('admin')),
//);
$this->menu = Utils::getOptMenus($this->action->id, $model);
?>

<fieldset>
    <legend>
        <?php echo Yii::t('app', 'List') ?></legend>

    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>