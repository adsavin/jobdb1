<div class="row-fluid">
    <?php
    if (Yii::app()->user->checkAccess("Administrator")) {
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t("app", 'Home'),
            'headerIcon' => 'icon-user',
            'content' => '',
            "htmlOptions" => array(
                "class" => "span12",
            ),
        ));
        ?>
        <div class="row-fluid">            
            <?= item("Language", "language/admin", "globe32.png") ?>
            <?= item("Edit Translattion", "translate/edit/admin", "flag86.png") ?>
            <?= item("Translate Missing", "translate/edit/missing", "magnifier52.png") ?>
            <?= item("Common", "common/admin", "setting5.png") ?>
            <?= item("Menu", "menu/admin", "notes26.png") ?>
            <?= item("Sub Menu", "menuSub/admin", "notes27.png") ?>            
        </div>
        <br>
        <div class="row-fluid"> 
            <?= item("Users", "user/admin", "profile29.png") ?>
            <?= item("Roles", "srbac/authitem/assign", "screwdriver26.png") ?>
            <?= item("Widgets", "widget/admin", "briefcase65.png") ?>
            <?= item("Provinces", "province/admin", "location68.png") ?>
            <?= item("Coordinate", "coor/admin", "location67.png") ?>
            <?= item("Sing Out", "site/logout", "power.png") ?>
        </div>
        <?php
        $this->endWidget();
    }

    if (Yii::app()->user->checkAccess("Web Master")) {
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t("app", 'Home'),
            'headerIcon' => 'icon-home',
            'content' => '',
            "htmlOptions" => array(
                "class" => "span12",
            ),
        ));
        ?>
        
        <div class="row-fluid">            
            <?= item("Job", "jobContent/admin", "graduation1.png") ?>
            <?= item("Company", "company/admin", "stepped.png") ?>
            <?= item("Industry", "jobIndustry/admin", "medal1.png") ?>
            <?= item("CV", "cv/admin", "notes27.png") ?>
            <?= item("Invoice", "invoice/admin", "notes26.png") ?>
            <?= item("Report", "report/admin", "chart47.png") ?>            
        </div>
        <br>
        <div class="row-fluid">
            <?= item("Sing Out", "site/logout", "power.png") ?>
        </div>
        <?php
        $this->endWidget();
    }
    
    if (Yii::app()->user->checkAccess("Member")) {
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t("app", 'Home'),
            'headerIcon' => 'icon-home',
            'content' => '',
            "htmlOptions" => array(
                "class" => "span12",
            ),
        ));
        ?>
        
        <div class="row-fluid">
            <?= item("CV", "cv/index", "notes27.png") ?>
            <?= item("Sing Out", "site/logout", "power.png") ?>
        </div>        
        <?php
        $this->endWidget();
    }
    ?>
</div>

<?php    
function item($name, $url, $image) {
    $t = Yii::t("app", $name);
    echo '<div class="span2">
                <a href="index.php?r=' . $url . '" class="thumbnail" 
                   rel="' . $t . '" 
                   data-title="' . $t . '">
                    <img style="width: 120px;height: 120px;" class="dash_image" 
                         src="images/dashboard/' . $image . '" alt="' . $t . '"/> 
                    <center>' . $t . '</center>
                </a>
            </div>
        ';
}
?>