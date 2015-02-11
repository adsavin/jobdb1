<section id="navigation-main">  
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="nav-collapse">

                    <?php
//                    $menu_visibility = !Yii::app()->user->isGuest ? 'visible' : 'hidden';
//
//                    $jfunc = "";
//                    $langs = array();
//                    foreach (Yii::app()->translate->acceptedLanguages as $key => $value) {
//                        $jfunc .= '$("#lang_flag_' . $key . '").click(function(){
//                $.post("index.php?r=translate/translate/set",
//                        {"mp-translate":"' . $key . '"},
//                        function(){window.top.location.reload();}
//                )
//            });';
//                        $langs[$key] = CHtml::image("images/$key.gif", '', array("class" => 'pull-right thumbnail', 'id' => "lang_flag_$key", 'style' => 'cursor: pointer;width: 40px;'));
//                    }
//
//                    $translate = Yii::app()->translate;
//
//                    $languageList = "";
                    ?>
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'nav'),
                        'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                        'itemCssClass' => 'item-test',
                        'encodeLabel' => false,
                        'items' => array(
//                            array('label' => 'Home <span class="caret"></span>', 'url' => array('/site/index'), 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "our home page"),
//                                'items' => array(
//                                    array('label' => 'Home 1 - Nivoslider', 'url' => array('/site/index')),
//                                    array('label' => 'Home 2 - Bootstrap carousal', 'url' => array('/site/page', 'view' => 'home2')),
//                                    array('label' => 'Home 3 - Piecemaker2', 'url' => array('/site/page', 'view' => 'home3')),
//                                    array('label' => 'Home 4 - Static image', 'url' => array('/site/page', 'view' => 'home4')),
//                                    array('label' => 'Home 5 - Video header', 'url' => array('/site/page', 'view' => 'home5')),
//                                    array('label' => 'Home 6 - Without slider', 'url' => array('/site/page', 'view' => 'home6')),
//                                )),
//                            array('label' => 'Styles <span class="caret"></span>', 'url' => '#', 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "6 styles"),
//                                'items' => array(
//                                    array('label' => '<span class="style" style="background-color:#0088CC;"></span> Style 1', 'url' => "javascript:chooseStyle('none', 60)"),
//                                    array('label' => '<span class="style" style="background-color:#e42e5d;"></span> Style 2', 'url' => "javascript:chooseStyle('style2', 60)"),
//                                    array('label' => '<span class="style" style="background-color:#c80681;"></span> Style 3', 'url' => "javascript:chooseStyle('style3', 60)"),
//                                    array('label' => '<span class="style" style="background-color:#51a351;"></span> Style 4', 'url' => "javascript:chooseStyle('style4', 60)"),
//                                    array('label' => '<span class="style" style="background-color:#b88006;"></span> Style 5', 'url' => "javascript:chooseStyle('style5', 60)"),
//                                    array('label' => '<span class="style" style="background-color:#f9630f;"></span> Style 6', 'url' => "javascript:chooseStyle('style6', 60)"),
//                                )),
//                            array('label' => 'Features <span class="caret"></span>', 'url' => array('/site/page', 'view' => 'columns'), 'itemOptions' => array('class' => 'dropdown', 'tabindex' => "-1"), 'linkOptions' => array('class' => 'dropdown-toggle', 'data-toggle' => "dropdown", "data-description" => "cool features"),
//                                'items' => array(
//                                    array('label' => 'Columns', 'url' => array('/site/page', 'view' => 'columns')),
//                                    array('label' => 'Pricing tables', 'url' => array('/site/page', 'view' => 'pricing-tables')),
//                                    array('label' => 'UI Elements', 'url' => array('/site/page', 'view' => 'elements')),
//                                )),
                            array('label' => 'Home', 'url' => array('/site/index'), 'linkOptions' => array("data-description" => "what we are about"),),
                            array('label' => 'Service', 'url' => array('/site/page', 'view' => 'service'), 'linkOptions' => array("data-description" => "what we are about"),),
                            array('label' => 'News & Activities', 'url' => array('/site/page', 'view' => 'news'), 'linkOptions' => array("data-description" => "what we are about"),),
                            array('label' => 'About us', 'url' => array('/site/page', 'view' => 'about'), 'linkOptions' => array("data-description" => "what we are about"),),
                            array('label' => 'Job Content', 'url' => array('/jobContent'), 'linkOptions' => array("data-description" => "Manage the Job Content"), 'visible' => Yii::app()->user->checkAccess("JobContentAdministrating") ),
//                            array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area")),
//                            array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area")),
                        ),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /#navigation-main -->

<?php
    //Yii::app()->clientScript->registerScript("flag_func", $jfunc);