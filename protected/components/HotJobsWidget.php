<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HotJobsWidget
 *
 * @author adsavin
 */
class HotJobsWidget extends CWidget {

    public $itemRows;
    public $itemCols;
    public $limit;
    public $jobList;

    public function init() {
        parent::init();
        $this->jobList = JobContent::model()->findAll("hot_job = :hotJob order by last_update desc", array(
            "hotJob" => "On",
        ));
    }

    public function run() {

        $this->render("hotJobs", array(
            "hotJobs" => $this->jobList,
            "itemRows" => $this->itemRows,
            "itemCols" => $this->itemCols,
            "limit" => $this->limit,
        ));
    }

}
