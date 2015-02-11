<?php
/** @var InvoiceController $this */
/** @var Invoice $model */
$this->breadcrumbs = array(
    'Invoices' => array('index'),
//    $model->id,
);

$this->menu = Utils::getOptMenus($this->action->id, $model);

Yii::app()->session["invoice"] = $this->renderPartial("print", array(
    "model" => $model,
        ), true);
echo Yii::app()->session["invoice"];
?>

<div class="row-fluid">
    <div class="form-actions">
        <?php
        $this->widget("bootstrap.widgets.TbButton", array(
            "type" => "danger",
            "label" => Yii::t("app", "Download PDF"),
            'url' => array("print")
        ));
        ?>
    </div>
</div>