<?php

$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $model->search(),
    'itemView' => '_view_cv',
    "summaryText" => "",
));
