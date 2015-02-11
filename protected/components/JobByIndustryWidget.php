<?php

class JobByIndustryWidget extends CWidget {

//    public $dataProvider;
    public $id;
    
    public function run() {
        $this->render("jobByIndustry", array(
//            "dataProvider" => $this->dataProvider,
            "id" => $this->id,
        ));
    }

}
