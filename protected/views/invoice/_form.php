<div class="form">
    <div class="row-fluid">
        <div class="span12">
            <?php
            /** @var InvoiceController $this */
            /** @var Invoice $model */
            /** @var AweActiveForm $form */
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'id' => 'invoice-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
                'type' => 'horizontal',
            ));
            ?>
            <?php echo $form->errorSummary($model) ?>
            <div class="row-fluid">
                <center>
                    <label for="Invoice_company_id">Company</label>
                    <?php
                    echo $form->dropDownList($model, 'company_id', CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()), array(
                        'onChange' => 'window.location = "index.php?r=' . $this->route . '" + "&company_id=" + this.value',
                        'prompt' => Yii::t('app', '-- Please Select --'),
                    ));
                    ?>
                </center>
            </div>
        </div>
        <div id="publish-result">
            <?php
            if (isset($_GET["company_id"]) && is_numeric($_GET["company_id"])) {
                $this->widget('bootstrap.widgets.TbGridView', array(
                    'id' => 'publish-grid',
                    "htmlOptions" => array(
                        "class" => "table table-hover",
                    ),
                    'type' => 'striped condensed hover',
                    'dataProvider' => $publish->search(),
                    'filter' => $publish,
                    "summaryText" => "",
                    'selectableRows' => 2,
                    'columns' => array(
                        array(
                            'class' => 'CCheckBoxColumn',
                            'id' => 'publish_id',
                            'value' => '$data->id',
                            'htmlOptions' => array(
                                "style" => "text-align: center",
                                "class" => "span1",
                            ),
                        ),
                        array(
                            "name" => "jobContent.job_reference_number",
                            "header" => Yii::t("app", "Job No."),
                            'htmlOptions' => array(
                                "style" => "text-align: center",
                                "class" => "span2",
                            ),
                        ),
                        array(
                            "name" => "jobContent.job_title",
                            "header" => Yii::t("app", "Job Title"),
                            'htmlOptions' => array(
                                "style" => "text-align: center",
                                "class" => "span5",
                            ),
                        ),
                        array(
                            "name" => "start_date",
                            "type" => "date",
                            'filter' => false,
                            "htmlOptions" => array(
                                "style" => "text-align: center",
                                "class" => "span2",
                            )
                        ),
                        array(
                            "name" => "end_date",
                            "type" => "date",
                            'filter' => false,
                            "htmlOptions" => array(
                                "style" => "text-align: center",
                                "class" => "span2",
                            )
                        ),
                        array(
                            "header" => "Weeks",
                            "value" => 'ceil(date_diff(date_create($data->start_date), date_create($data->end_date))->format("%a")/7).'
                            . '\'<input name="row\'.$data->id.\'" type="hidden" value="\'.ceil(date_diff(date_create($data->start_date), date_create($data->end_date))->format("%a")/7).\'" />\'',
                            "type" => "raw",
                            "htmlOptions" => array(
                                "style" => "text-align: center",
                                "class" => "span1",
                            )
                        ),
                    )
                ));
            }
            ?>            
        </div>        
    </div>
    <div class="row-fluid">
        <div class="span12 payment">
            <div class="row-fluid">
                <label class="control-label" for="Invoice_sum">Total Weeks: </label>
                <?php
                echo $form->numberField($model, 'no_of_week', array(
                    'class' => 'span3',
                    'readonly' => true,
                    'value' => 0,
                ))
                ?>                
            </div>
            <div class="row-fluid">
                <label class="control-label" for="total_position">Total Position: </label>
                <?php
                echo $form->numberField($model, 'no_of_position', array(
                    'class' => 'span3 ',
                    'readonly' => TRUE,
                    'value' => 0,
                ))
                ?>            
            </div>
            <div class="row-fluid">
                <label class="control-label" for="Invoice_priceperweek">Unit Price: </label>
                <?php
                echo $form->numberField($model, 'priceperweek', array(
                    'class' => 'span3',
                    'readonly' => true,
                    'value' => 0,
                ))
                ?>
            </div>
            <div class="row-fluid">
                <label class="control-label" for="Invoice_total">Total: </label>
                <?php
                echo $form->numberField($model, 'total', array(
                    'class' => 'span3',
                    'readonly' => true,
                    'value' => 0,
                ))
                ?>
            </div>
            <div class="row-fluid">
                <label class="control-label" for="Invoice_discount">Discount (%): </label>
                <?php
                echo $form->numberField($model, 'discount', array(
                    'class' => 'span3',
                    'readonly' => TRUE,
                    'value' => 0
                ))
                ?>                              
            </div>
            <div class="row-fluid">
                <label class="control-label label-danger" for="Invoice_total">Net Total: </label>
                <?php
                echo $form->numberField($model, 'net_total', array(
                    'class' => 'span3',
                    'readonly' => true,
                    'value' => 0,
                ))
                ?>
            </div>
            <div class="row-fluid">
                <label class="control-label" for="Invoice_payment_status">Payment Status: </label>
                <?php echo $form->dropDownList($model, 'payment_status', Utils::enumItem($model, 'payment_status'), array('class' => 'span3')); ?>                    
            </div>
        </div>
    </div>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'primary',
            'label' => $model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
        ));
        ?>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label' => Yii::t('app', 'Cancel'),
            'htmlOptions' => array(
                'onclick' => 'javascript:history.go(-1)',
            ),
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
<?php
Yii::app()->clientScript->registerScript('suminvoice', "
    $('[name^=id_]').wrap('<label class=list></label>');
    $('<span></span>').insertAfter('[name^=id_]');
    $('[name=id_all]').change(function() {
        $('[name^=id_all]').prop('checked', true);
    });
    $('tr[class=filters]').remove();
    $('input[class=select-on-check]').on('change', function() {
        var noOfWeek = 0;
        var noOfPosi = 0;
        $('input[class=select-on-check]').each(function() {                
            var id = $(this).val();            
            if($(this).prop('checked') === true) {    
                noOfWeek += parseInt($('input[type=hidden][name=row'+id+']').val());
                noOfPosi++;
            }
        });
        $('#Invoice_no_of_week').val(noOfWeek);
        $('#Invoice_no_of_position').val(noOfPosi);
                
        var price = 0;
        var discount = 0;
        if(noOfWeek > 0) {
            $.ajax({    dataType: 'json',
                        url: '" . Yii::app()->baseUrl . "/index.php?r=quatation/getPrice',
                        data: {
                            position: noOfPosi
                        },
                        success: function (data) {                        
                            if(data !== false) {                        
                            if(data['price'] !== null) price = parseInt(data['price']);
                            if(data['discount'] !== null) discount = parseInt(data['discount']);
                            if(discount === null) discount = 0;
                                $('#Invoice_priceperweek').val(price);
                                $('#Invoice_discount').val(discount);
                                $('#Invoice_total').val(noOfWeek * price);
                                $('#Invoice_net_total').val(noOfWeek * price * (100-discount)/100);
                            }
                        }
            });            
        } else {
            $('#Invoice_priceperweek').val(0);
            $('#Invoice_discount').val(0);
            $('#Invoice_total').val(0);
            $('#Invoice_net_total').val(0);
        }
        
    });    
    $('#publish_id_all').change(function() {        
        if($(this).prop('checked') === true) {    
            $('input[class=select-on-check]').prop('checked', true);
            $('input[class=select-on-check]').change();            
        } else {
            $('input[class=select-on-check]').prop('checked', false);
            $('input[class=select-on-check]').change();
        }
    });
    
    $('#publish-grid table tbody tr').on('click', function(e) {
        if(!$(this).hasClass('selected')) {            
            $('input[class=select-on-check]').change();            
        }
    });
    
    function total() {        
        $('#Invoice_total').val(parseInt($('#Invoice_sum').val()) - parseInt($('#Invoice_discount').val()));
    }        
");
if (isset($_GET["company_id"]) && is_numeric($_GET["company_id"])) {
    $id = $_GET["company_id"];
    Yii::app()->clientScript->registerScript('select', "$('select option[value=$id]').prop('selected', true)");
}

//Yii::app()->clientScript->registerScript('settings-script', <<<EOD
//    initForms('myform');
//    $('.sel-image').live('click',function() {
//        $('#preview img').attr('src', $(this).find('img').attr('src'));
//        $(this).parent().addClass('active');;
//        $(this).parent().siblings().removeClass('active');
//        $('#SettingsData_stdImg').attr('value', $(this).attr('rel'));
//        return false;
//    });
//EOD
//);
?>
<style>
    input[type='number'] {
        text-align: right;
    }
</style>
<!--<script>
    var functio() {
        var j = 0;

    }
</script>-->