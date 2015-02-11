<?php

class CvController extends SBaseController {

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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->layout = "//layouts/column1";
        $model = Cv::model()->find("user_id=:userid", array(":userid" => Yii::app()->user->id));
        if (isset($model)) {
            $this->redirect(array('update', 'id' => $model->id));
        } else {
            $model = new Cv;
        }
        $this->performAjaxValidation($model, 'cv-form');

        if (isset($_POST['Cv'])) {
            $model->attributes = $_POST['Cv'];
            $connection = Yii::app()->db;
            $transactin = $connection->beginTransaction();
            try {
                if (isset($_FILES['Cv']['name']['photo'])) {
                    $model->photo = "member_" . date("YmdHis") . ".jpg";
                }

                if (!$model->save()) {
                    throw new Exception(Yii::app()->params["cannotSave"]);
                }
                if (isset($_POST['Cv']['jobFunctions'])) {
                    foreach ($_POST['Cv']['jobFunctions'] as $key => $value) {
                        $jobFunc = new CvHasJobFunction();
                        $jobFunc->cv_id = $model->id;
                        $jobFunc->job_function_id = $value;
                        if (!$jobFunc->save()) {
                            throw new Exception(Yii::app()->params["cannotSave"]);
                        }
                    }
                }

                if (isset($_POST["Cv"]["provinces"])) {
                    foreach ($_POST["Cv"]["provinces"] as $key => $value) {
                        $cvProv = new CvHasProvince();
                        $cvProv->cv_id = $model->id;
                        $cvProv->province_id = $value;
                        if (!$cvProv->save()) {
                            throw new Exception(Yii::app()->params["cannotSave"]);
                        }
                    }
                }

                if (isset($_FILES['Cv']['name']['photo'])) {
                    $file = $model->photo;
                    move_uploaded_file($_FILES['Cv']['tmp_name']['photo'], Yii::app()->params['cvProfileDir'] . $file);
                }

                //attached file management
                if (isset($_FILES['cvAttachFiles'])) {
                    //upload new files
                    foreach ($_FILES['cvAttachFiles']['name'] as $key => $filename) {
                        $attachedFile = new CvAttachFile();
                        $attachedFile->name = $filename;
                        $attachedFile->cv_id = $model->id;
                        if (!$attachedFile->save()) {
                            throw new Exception(Yii::app()->params["cannotSave"]);
                        }
                        move_uploaded_file($_FILES['cvAttachFiles']['name'][$key], Yii::app()->params['cvAttacheDir'] . $filename);
                    }
                }

                $transactin->commit();
//                $this->redirect(array('view', 'id' => $model->id));
            } catch (Exception $exc) {
                Utils::handleException($exc, $transactin);
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
        $this->layout = "//layouts/column1";
        $model = $this->loadModel($id);
        $photo = $model->photo;

        if ($model->user_id != Yii::app()->user->id && Yii::app()->user->checkAccess("Member")) {
            $this->redirect(array("create"));
        }

        $this->performAjaxValidation($model, 'cv-form');

        if (isset($_POST['Cv'])) {
            $model->attributes = $_POST['Cv'];
            if (strlen($_FILES['Cv']['name']['photo']) == 0) {
                $model->photo = $photo;
            }

            $connection = Yii::app()->db;
            $transactin = $connection->beginTransaction();
            try {
                if (!$model->save()) {
                    throw new Exception(Yii::app()->params["cannotSave"]);
                }
                if (isset($_POST['Cv']['jobFunctions'])) {
                    $model->saveManyMany('jobFunctions', $_POST['Cv']['jobFunctions']);
                } else {
                    $model->saveManyMany('jobFunctions', array());
                }
                if (isset($_POST['Cv']['provinces'])) {
                    $model->saveManyMany('provinces', $_POST['Cv']['provinces']);
                } else {
                    $model->saveManyMany('provinces', array());
                }
                $this->redirect(array('view', 'id' => $model->id));

                //profile photo                
                if (strlen($_FILES['Cv']['name']['photo']) > 0) {
                    if (!isset($model->photo)) { //thar y bo kiey upload photo ma korn, gen filename mai
                        $file = "member_" . date("YmdHis") . ".jpg";
                        $model->photo = $file;
                        $model->save();
                    } else { //thar kiey upload photo ma korn leo
                        @unlink(Yii::app()->params['cvProfileDir'] . $model->photo);
                    }
                    move_uploaded_file($_FILES['Cv']['tmp_name']['photo'], Yii::app()->params['cvProfileDir'] . $file);
                }

                //attached file management
                if (strlen($_FILES['cvAttachFiles']['name'][0]) > 0) {
                    // delete old files
                    foreach ($this->findFiles() as $filename)
                        foreach ($model->cvAttachFiles as $file)
                            if ($file->name == $filename)
                                @unlink(Yii::app()->params['cvAttacheDir'] . $filename);

                    //upload new files
                    foreach ($_FILES['cvAttachFiles']['name'] as $key => $filename) {
                        $attachedFile = new CvAttachFile();
                        $attachedFile->name = $filename;
                        $attachedFile->cv_id = $model->id;
                        if (!$attachedFile->save()) {
                            throw new Exception(Yii::app()->params["cannotSave"]);
                        }
                        move_uploaded_file($_FILES['cvAttachFiles']['tmp_name'][$key], Yii::app()->params['cvAttacheDir'] . $filename);
                    }
                }

                $transactin->commit();
//                $this->redirect(array('view', 'id' => $model->id));
            } catch (Exception $exc) {
                Utils::handleException($exc, $transactin);
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
//// we only allow deletion via POST request
//            $this->loadModel($id)->delete();
//
//// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
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
//        $dataProvider = new CActiveDataProvider('Cv');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
        $model = Cv::model()->find("user_id=:userid", array(":userid" => Yii::app()->user->id));
        if (isset($model)) {
            $this->redirect(array('update', 'id' => $model->id));
        } else {
            $this->redirect(array("create"));
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cv('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Cv']))
            $model->attributes = $_GET['Cv'];

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
        $model = Cv::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cv-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionLock($id, $lock) {
        $model = $this->loadModel($id);
        $model->is_lock = $lock;
        if ($model->save()) {
            $this->redirect(array("admin"));
        }
    }

    /**
     * @return array filename
     */
    public function findFiles() {
        return array_diff(scandir(Yii::app()->params['cvAttacheDir']), array('.', '..'));
    }

}
