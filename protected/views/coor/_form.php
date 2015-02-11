<div class="row-fluid">
    <div class="span4">
        <div class="form">
            <?php
            /** @var CoorController $this */
            /** @var Coor $model */
            /** @var AweActiveForm $form */
            $form = $this->beginWidget('ext.AweCrud.components.AweActiveForm', array(
                'id' => 'coor-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => false,
            ));
            ?>

        <!--<p class="note">-->
            <?php // echo Yii::t('app', 'Fields with') ?> 
            <!--<span class="required">*</span>-->
            <?php // echo Yii::t('app', 'are required') ?>
            <!--.    </p>-->

            <?php echo $form->errorSummary($model) ?>
            <?php echo $form->dropDownListRow($model, 'province_id', CHtml::listData(Province::model()->findAll(), 'id', Province::representingColumn())) ?>
            <?php echo $form->textFieldRow($model, 'x', array('id' => "img-x", 'class' => 'span5', 'maxlength' => 100)) ?>
            <?php echo $form->textFieldRow($model, 'y', array('id' => "img-y", 'class' => 'span5', 'maxlength' => 100)) ?>                   
        </div>
    </div>
    <div class="span5">
        <div class="form-inline">
            <label for="map-width">Width: </label>
            <input class="span2" type="text" value="266" id="map-width" name="map-width" placeholder="Pixel" onchange="apply_map();" />
            <label for="map-height">Height: </label>
            <input class="span2" type="text" value="290" id="map-height" name="map-height" placeholder="Pixel" onchange="apply_map();" />
        </div>
        <?php
        echo CHtml::image("images/laos_map.jpg", "Laos Map", array(
            "id" => "laos_map",
            "style" => "width: 266px;height: 290px;",
        ));
        ?>
        <div class="form-inline">
            <label for="map-xx">X: </label>
            <input class="span2" type="text" readonly="readonly" id="img-xx" name="map-xx" />
            <label for="map-yy">Y: </label>
            <input class="span2" type="text" readonly="readonly" id="img-yy" name="map-yy" />            
        </div>
    </div>
</div>
<div class="form-actions">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType' => 'submit',
        'type' => 'primary',
        'label' => $this->action=="create" ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        //'buttonType'=>'submit',
        'label' => Yii::t('app', 'Cancel'),
        'htmlOptions' => array('onclick' => 'javascript:history.go(-1)')
    ));
    ?>
    <?php
    echo CHtml::ajaxSubmitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), array(), array(
//                "post" => array("")
            ), array());
    ?>
</div>
<script type="text/javascript">
    function apply_map() {
        $("#laos_map").attr("style", "width: " + $('#map-height').val() + "px;height: " + $('#map-height').val() + "px;");
    }
</script>
<script type="text/javascript">


    /*
     Script code
     Here add the ID of the HTML elements for which to show the mouse coords
     Within quotes, separated by comma.
     E.g.:   ['imgid', 'divid'];
     */
    var elmids = ['laos_map'];
    var x, y = 0; // variables that will contain the coordinates

// Get X and Y position of the elm (from: vishalsays.wordpress.com)
    function getXYpos(elm) {
        x = elm.offsetLeft; // set x to elm’s offsetLeft
        y = elm.offsetTop; // set y to elm’s offsetTop

        elm = elm.offsetParent; // set elm to its offsetParent

        //use while loop to check if elm is null
        // if not then add current elm’s offsetLeft to x
        //offsetTop to y and set elm to its offsetParent
        while (elm != null) {
            x = parseInt(x) + parseInt(elm.offsetLeft);
            y = parseInt(y) + parseInt(elm.offsetTop);
            elm = elm.offsetParent;
        }

        // returns an object with "xp" (Left), "=yp" (Top) position
        return {'xp': x, 'yp': y};
    }

// Get X, Y coords, and displays Mouse coordinates
    function getCoords(e) {
        // coursesweb.net/
        var xy_pos = getXYpos(this);
        // if IE
        if (navigator.appVersion.indexOf("MSIE") != -1) {
            // in IE scrolling page affects mouse coordinates into an element
            // This gets the page element that will be used to add scrolling value to correct mouse coords
            var standardBody = (document.compatMode == 'CSS1Compat') ? document.documentElement : document.body;
            x = event.clientX + standardBody.scrollLeft;
            y = event.clientY + standardBody.scrollTop;
        }
        else {
            x = e.pageX;
            y = e.pageY;
        }

        x = x - xy_pos['xp'];
        y = y - xy_pos['yp'];
        // displays x and y coords in the #coords element
        document.getElementById('img-xx').value = x;
        document.getElementById('img-yy').value = y;
    }

// register onmousemove, and onclick the each element with ID stored in elmids
    for (var i = 0; i < elmids.length; i++) {
        if (document.getElementById(elmids[i])) {
            // calls the getCoords() function when mousemove
            document.getElementById(elmids[i]).onmousemove = getCoords;
            // execute a function when click
            document.getElementById(elmids[i]).onclick = function() {
                document.getElementById('img-x').value = x;
                document.getElementById('img-y').value = y;
            };
        }
    }

</script>

<?php $this->endWidget(); ?>