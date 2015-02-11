<!--<div class="top-right">
    <div class="top_menu">        
        <div class="fb-like-box" 
             data-href="<?php // echo $link             ?>" 
             data-width="<?php // echo $width             ?>" 
             data-height="<?php // echo $height             ?>" 
             data-colorscheme="light" 
             data-show-faces="true" 
             data-header="true" 
             data-stream="false" 
             data-show-border="true"></div>
    </div>
</div>-->
<!--<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FJockyShop&amp;width=100&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=1538499549726351" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:258px;" allowTransparency="true"></iframe>-->
<?php
$this->beginWidget("bootstrap.widgets.TbBox", array(
    "title" => Yii::t("app", "Facebook"),
    "htmlHeaderOptions" => array(
        "class" => "box-header"
    ),
));
?>
<div class="fb-like-box" 
     data-href="https://www.facebook.com/JockyShop" 
     data-width="230" 
     data-colorscheme="light" 
     data-show-faces="true" 
     data-header="false" 
     data-stream="false" 
     data-show-border="false">
</div>
<?php
$this->endWidget();
