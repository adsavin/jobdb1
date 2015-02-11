<?php

/**
 * The widget to create a search form for news and announcement.
 * It render 'searchform' as a view
 * @author aphisith
 *
 */
class PublishedJobContentWidget extends CWidget {

    public $controller;

    public function run() {
        $model = new JobContent('searchPublishedJob');
//        $model->unsetAttributes(); // clear any default values
//        if (isset($_GET['JobContent'])) {
//            $model->attributes = $_GET['JobContent'];
//        }

        $this->render('publishedJobContent', array(
            'model' => $model,
            "controller" => $this->controller,
        ));
    }

}
