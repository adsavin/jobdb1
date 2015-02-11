<div class="row-fluid">
    <div id="print-preview" class="span12">
        <?php
        $INVOICE = Common::model()->find("code=:code", array(
            ":code" => "INVOICE"
        ));

        $INVOICE->content = str_replace('$date', date("d/m/Y"), $INVOICE->content);
        $INVOICE->content = str_replace('$invoice_no', $model->no, $INVOICE->content);
        $INVOICE->content = str_replace('$company_name', $model->company->name, $INVOICE->content);
        $INVOICE->content = str_replace('$company_address', $model->company->address, $INVOICE->content);
        $INVOICE->content = str_replace('$company_telephone', $model->company->telelphone, $INVOICE->content);
        $INVOICE->content = str_replace('$company_email', $model->company->email , $INVOICE->content);
        $INVOICE->content = str_replace('$note', $model->note , $INVOICE->content);
        
        $INVOICE->content = str_replace('$table', $this->renderPartial("table", array("model" => $model), TRUE), $INVOICE->content);

        echo $INVOICE->content;
        ?>

    </div>
</div>