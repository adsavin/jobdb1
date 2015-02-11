<?php if (!YII_DEBUG): ?>                    
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '374915366022936',
                xfbml: true,
                version: 'v2.2'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<?php endif; ?>
<div class="container">
    <div class="row-fluid " >
        <div class="span2" style="vertical-align: central">
            <?php
            echo CHtml::link(CHtml::image("images/logo.jpg", "JOBSWEB.LA", array(
                        "style" => "max-width: 100px;max-height: 40px;position: absolute;margin-top: 5px;",
                        "class" => "thumbnail",
                        "id" => "logo_index",
                    )), array("/site/index"), array(
            ));
            ?>            
        </div>

        <div class="span10">
            <div class="row-fluid">
                <?php
                $translate = Yii::app()->translate;
                $jfunc = "";
                foreach (Yii::app()->translate->acceptedLanguages as $key => $value) {
                    $jfunc .= '$("#lang_flag_' . $key . '").click(function(){
                                    $.post("index.php?r=translate/translate/set",
                                            {"mp-translate":"' . $key . '"},
                                            function(){window.top.location.reload();}
                                    )
                                });';
                    echo CHtml::image(Yii::app()->baseUrl . '/images/' . $key . '.gif', $value, array(
                        "class" => "lang_flag pull-right circular thumbnail",
                        'id' => "lang_flag_$key",
                    ));
                }
                ?>
                <?php
                if (Yii::app()->user->checkAccess("Administrator")) {
                    $this->widget('ext.widgets.ddmenu.XDropDownMenu', array(
                        'items' => array(
                            array('label' => Yii::t('app', 'Home'), 'url' => array('/site/index')),
                            array('label' => Yii::t('app', 'Quotation'), 'url' => array('/quatation/admin')),
                            array('label' => Yii::t('app', 'Language'), 'url' => '#',
                                "items" => array(
                                    array('label' => Yii::t("app", "Manage"), 'url' => array('/language/index')),
                                    array('label' => Yii::t("app", "Edit Translation"), 'url' => array('/translate/edit/admin')),
                                    array('label' => Yii::t("app", "Translate Missing"), 'url' => array('/translate/edit/missing')),
                                )),
                            array('label' => Yii::t('app', 'Common'), 'url' => array('/common/index')),
                            array('label' => Yii::t("app", 'Content'), 'url' => '#',
                                'items' => array(
                                    array('label' => Yii::t("app", "Menu"), 'url' => array('/menu/index')),
                                    array('label' => Yii::t("app", "Menu Translate"), 'url' => array('/menuTranslate/index')),
                                    array('label' => Yii::t("app", "Sub Menu"), 'url' => array('/menuSub/index')),
                                    array('label' => Yii::t("app", "Sub Menu Translate"), 'url' => array('/menuSubTranslate/index')),
                                )
                            ),
                            array('label' => Yii::t('app', 'Users'), 'url' => array('/user/index')),
                            array('label' => Yii::t('app', 'Roles'), 'url' => array('/srbac/authitem/assign')),
                            array('label' => Yii::t('app', 'Widgets'), 'url' => array('/widget/index')),
                            array('label' => Yii::t('app', 'Province'), 'url' => array('/province/index')),
                            array('label' => Yii::t('app', 'Coords'), 'url' => array('/coor/index')),
                            array('label' => Yii::t('app', 'Sign out'), 'url' => array('/site/logout')),
                        ),
                    ));
                } else if (Yii::app()->user->checkAccess("Web Master")) {
                    $this->widget('ext.widgets.ddmenu.XDropDownMenu', array(
                        'items' => array(
                            array('label' => Yii::t('app', 'Home'), 'url' => array('/site/index')),
                            array('label' => Yii::t('app', 'Job'), 'url' => array('/jobContent/index')),
                            array('label' => Yii::t('app', 'Company'), 'url' => array('/company/index')),
                            array('label' => Yii::t('app', 'Industry'), 'url' => array('/jobIndustry/index')),
                            array('label' => Yii::t('app', 'CV'), 'url' => array('/cv/admin')),
                            array('label' => Yii::t('app', 'Invoice'), 'url' => array('/invoice/index')),
                            array('label' => Yii::t('app', 'Report'), 'url' => array('/publish/admin')),
                            array('label' => Yii::t('app', 'Sign out'), 'url' => array('/site/logout')),
                        ),
                    ));
                } else if (Yii::app()->user->checkAccess("Member")) {
                    $this->widget('ext.widgets.ddmenu.XDropDownMenu', array(
                        'items' => array(
                            array('label' => Yii::t('app', 'Home'), 'url' => array('/site/index')),
                            array('label' => Yii::t("app", 'Post your CV'), 'url' => array('/cv/index')),
                            array('label' => Yii::t('app', 'Sign out'), 'url' => array('/site/logout')),
                        ),
                    ));
                } else {
                    $menus = Menu::model()->findAll("section=:section AND `show`=:show ORDER BY order_no", array(
                        ":section" => "Top",
                        ":show" => "Yes",
                    ));
                    $items;
                    foreach ($menus as $menu) {
                        $item = array();
                        $item['label'] = $menu->name;
                        if (isset($menu->content)) {
                            $item['url'] = array("/site/viewContent", "id" => $menu->id);
                        } else {
                            $item['url'] = $menu->link;
                        }
                        if (isset($menu->menuSubs)) {
                            foreach ($menu->menuSubs as $subMenu) {
                                $sub['label'] = $subMenu->name;
                                if (isset($subMenu->content)) {
                                    $sub['url'] = array("/site/viewSubContent", "id" => $subMenu->id);
                                } else {
                                    $sub['url'] = $subMenu->link;
                                }
                                $item["items"][] = $sub;
                            }
                        }
                        $items[] = $item;
                    }
                    $this->widget('ext.widgets.ddmenu.XDropDownMenu', array(
                        'items' => $items,                        
                    ));
                }
                ?>
            </div>
        </div>
    </div><!--/.row-fluid header -->
</div>
<?php
Yii::app()->clientScript->registerScript("flag_func", $jfunc);
Yii::app()->clientScript->registerScript("tt", "$(\"div[id^='ui-tooltip-']\").hide();");
//Yii::app()->clientScript->registerScript("calenda", "$('.day').click(function (){"
//        . "alert('kkk');"
//        . "});");
