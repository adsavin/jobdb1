<?php
$print = '<div class="row-fluid">
    <div id="print-preview" class="span12">';
$INVOICE->content = str_replace('$table', $this->renderPartial("table", array("models" => Quatation::model()->findAll()), TRUE), $INVOICE->content);
$print .= $INVOICE->content;
$print .= '</div>
</div>';
Yii::app()->session["quotation"] = $print;
echo $print;
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