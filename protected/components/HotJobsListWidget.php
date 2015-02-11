<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HotJobsListWidget
 *
 * @author adsavin
 */
class HotJobsListWidget extends CWidget {

    public $limit;    
    
    public function run() {
        //cause this layout maybe use by many controllers, so do searching here...
        $jobList = JobContent::model()->findAll("hot_job=:hot_job order by last_update desc", array("hot_job" => "On")); 
        if($this->limit > count($jobList)) {
            $this->limit = count($jobList);
        }
        $this->render("hotJobsList", array(
            "limit" => $this->limit,
            "jobList" => $jobList,
        ));
    }

}
