<?php

class JobContentController extends SBaseController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
//        $model->count_view++;
//        $model->update(array('count_view'));
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->layout = "//layouts/admin";
        $_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
        $_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl . "/uploads/"; // URL for the uploads folder
        $_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath . "/../uploads/"; // path to the uploads folder

        $model = new JobContent;

        $this->performAjaxValidation($model, 'job-content-form');

        if (isset($_POST['JobContent'])) {
            $model->attributes = $_POST['JobContent'];
            if ($model->status == 'Published') {
                $model->published_date = date('Y-m-d');
            }
            if ($model->status == 'Un-Published') {
                $model->un_published_date = date('Y-m-d');
            }

            $image = CUploadedFile::getInstance($model, 'logo_file_name');
//            $model->logo_file_name = date('YmdHis') . '_' . $image->getName();
            $model->logo_file_name = $image->getName();

            $model->created_date = date("d-m-Y H:i:s");
            $model->count_like = 0;
            $model->count_view = 0;
            $model->user_id = Yii::app()->user->id;
            
            if ($model->save()) {
                $image->saveAs($model->getPath());
                $image = Yii::app()->image->load($model->getPath());
                $image->resize(280, 180)->quality(75)->sharpen(20);
                $image->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $this->layout = "//layouts/admin";
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'job-content-form');

        if (isset($_POST['JobContent'])) {
            $model->attributes = $_POST['JobContent'];

            if ($model->status == 'Published') {
                $model->published_date = date('Y-m-d');
            }
            if ($model->status == 'Un-Published') {
                $model->un_published_date = date('Y-m-d');
            }
            $image = CUploadedFile::getInstance($model, 'logo_file_name');
//            $model->logo_file_name = date('YmdHis') . '_' . $image->getName();
            $model->logo_file_name = $image->getName();

            if ($model->save()) {
                $image->saveAs($model->getPath());

                $image = Yii::app()->image->load($model->getPath());
                $image->resize(280, 180)->quality(75)->sharpen(20);
                $image->save();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
//    public function actionDelete($id) {
//        if (Yii::app()->request->isPostRequest) {
//            // we only allow deletion via POST request
//            $this->loadModel($id)->delete();
//
//            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//            if (!isset($_GET['ajax'])) {
//                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//            }
//        } else {
//            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
//        }
//    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->layout = "//layouts/admin";
        /*
          $dataProvider=new CActiveDataProvider('JobContent');
          $this->render('index', array(
          'dataProvider' => $dataProvider,
          ));
         * 
         */
        $this->redirect(array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $this->layout = "//layouts/admin";
        $model = new JobContent('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['JobContent'])) {
            $model->attributes = $_GET['JobContent'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $modelClass = __CLASS__) {
        $model = JobContent::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model, $form = null) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'job-content-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionOrganizationAutoComplete() {
        
    }

}
