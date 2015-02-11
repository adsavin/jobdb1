<div id="sidebar">
    <?php
    if (count($this->menu)) {
        $this->beginWidget("bootstrap.widgets.TbBox", array(
            "title" => Yii::t("app", "Operations"),
            "htmlHeaderOptions" => array(
            ),
        ));
        $this->widget('bootstrap.widgets.TbMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'active'),
        ));
        $this->endWidget();
    }
    ?>
</div>

