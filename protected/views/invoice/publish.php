<?php

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
            "name" => "jobContent.company_id",
            "value" => '$data->jobContent->company->name',
            "header" => Yii::t("app", "Company"),
            "filter" => CHtml::listData(Company::model()->findAll(), 'id', Company::representingColumn()),
        ),
        array(
            "name" => "jobContent.job_reference_number",
            "header" => Yii::t("app", "Job No."),
        ),
        array(
            "name" => "jobContent.job_title",
            "header" => Yii::t("app", "Job Title"),
//            'filter' => false,
        ),
        array(
            "name" => "start_date",
            "type" => "date",
            'filter' => false,
            "htmlOptions" => array(
//                "style" => "text-align: center;",
            ),            
        ),
        array(
            "name" => "end_date",
            "type" => "date",
            'filter' => false,
            "htmlOptions" => array(
//                "class" => "text-center"
             )
        ),
        array(
            "header" => "Days",
            "value" => 'date_diff(date_create($data->start_date), date_create($data->end_date))->format("%a")',
            "type" => "number",
//            'filter' => false,
            "htmlOptions" => array(
//                "class" => "text-center"
            )
        ),
        array(
            'class' => 'CCheckBoxColumn',
            'id' => 'select_publish_ids',
            'value' => '$data->id',
        ),
    )
));
