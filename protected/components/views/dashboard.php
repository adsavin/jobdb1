<div class="row-fluid">
    <?php
    if (Yii::app()->user->checkAccess("Administrator")) {
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t("app", 'Administrator'),
            'headerIcon' => 'icon-user',
            'content' => '',
            "htmlOptions" => array(
                "class" => "span12",
            ),
        ));
        ?>
        <div class="row-fluid">            
            <?= item("Language", "language/admin", "user.png") ?>
            <?= item("Edit Translattion", "translate/edit/admin", "user.png") ?>
            <?= item("Translate Missing", "translate/edit/missing", "user.png") ?>
            <?= item("Common", "common/admin", "user.png") ?>
            <?= item("Menu", "menu/admin", "user.png") ?>
            <?= item("Sub Menu", "menuSub/admin", "user.png") ?>            
        </div>
        <br>
        <div class="row-fluid"> 
            <?= item("Users", "user/admin", "user.png") ?>
            <?= item("Roles", "srbac/authitem/assign", "user_type.png") ?>
            <?= item("Widgets", "widget/admin", "user.png") ?>
            <?= item("Provinces", "province/admin", "user.png") ?>
            <?= item("Coordinate", "coor/admin", "user.png") ?>
            <?= item("Sing Out", "site/logout", "logout.png") ?>
        </div>
        <?php
        $this->endWidget();
    }

    if (Yii::app()->user->checkAccess("Web Master")) {
        $this->beginWidget('bootstrap.widgets.TbBox', array(
            'title' => Yii::t("app", 'Web Master'),
            'headerIcon' => 'icon-user',
            'content' => '',
            "htmlOptions" => array(
                "class" => "span12",
            ),
        ));
        ?>
        <div class="row-fluid">            
            <?= item("Language", "language/admin", "user.png") ?>
            <?= item("Edit Translattion", "translate/edit/admin", "user.png") ?>
            <?= item("Translate Missing", "translate/edit/missing", "user.png") ?>
            <?= item("Common", "common/admin", "user.png") ?>
            <?= item("Menu", "menu/admin", "user.png") ?>
            <?= item("Sub Menu", "menuSub/admin", "user.png") ?>            
        </div>
        <br>
        <div class="row-fluid"> 
            <?= item("Users", "user/admin", "user.png") ?>
            <?= item("Roles", "srbac/authitem/assign", "user_type.png") ?>
            <?= item("Widgets", "widget/admin", "user.png") ?>
            <?= item("Provinces", "province/admin", "user.png") ?>
            <?= item("Coordinate", "coor/admin", "user.png") ?>
            <?= item("Sing Out", "site/logout", "logout.png") ?>
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