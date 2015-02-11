<?php

class InvoiceController extends SBaseController {

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
    public function actionCreate($company_id = null) {
        $model = new Invoice;

        $this->performAjaxValidation($model, 'invoice-form');

        if (isset($_POST['Invoice'])) {
            $model->attributes = $_POST['Invoice'];
            $model->payment_status = str_replace("'", "", $model->payment_status);
            $connection = Yii::app()->db;
            $transaction = $connection->beginTransaction();
            try {
                if (!$model->save())
                    throw new Exception(Yii::t("app", "Can not Save..."));

                $chks = $_POST['publish_id'];
                foreach ($chks as $key => $value) {
                    $publish = Publish::model()->findByPk($value);
                    $publish->invoice_id = $model->id;
                    $publish->payment_status = $model->payment_status;
                    if (!$publish->save())
                        throw new Exception(Yii::t("app", "Can not Save..."));
                }
                $transaction->commit();
                $this->redirect(array("view", "id" => $model->id));
            } catch (Exception $exc) {
                Utils::handleException($exc, $transaction);
            }
        }

        $publish = new Publish();
        $publish->payment_status = "Pending";
        if (isset($company_id) && is_numeric($company_id)) {
            $publish->jobContent = new JobContent();
            $publish->jobContent->company_id = $company_id;
        }

        $this->render('create', array(
            'model' => $model,
            'publish' => $publish,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $this->performAjaxValidation($model, 'invoice-form');

        if (isset($_POST['Invoice'])) {
            $model->attributes = $_POST['Invoice'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionPaid($id) {
        $model = $this->loadModel($id);
        if (isset($model)) {
            $model->payment_status = "Received";
            $model->save();
        }
        $this->actionAdmin();
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
//        $dataProvider = new CActiveDataProvider('Invoice');
//        $this->render('index', array(
//            'dataProvider' => $dataProvider,
//        ));
        $this->redirect(array("admin"));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Invoice('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Invoice']))
            $model->attributes = $_GET['Invoice'];

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
        $model = Invoice::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'invoice-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionShowPublish() {
        if (Yii::app()->request->isAjaxRequest) {
            $company_id = $_POST['Invoice']['company_id'];
            $criteria = new CDbCriteria();
            $criteria->with = array(
                "jobContent" => array(
                    "condition" => "jobContent.company_id=$company_id",
                ),
            );
            $criteria->condition = "payment_status='Pending'";
            $dataProvider = new CActiveDataProvider(Publish::model());
            $dataProvider->criteria = $criteria;
            echo $this->renderPartial("publish", array(
                "dataProvider" => $dataProvider,
                    ), true);
        }
    }

    public function actionPrint() {
        $invoice = Yii::app()->session["invoice"];
        if (isset($invoice)) {
            //      AddPage($orientation='',$condition='', $resetpagenum='', $pagenumstyle='', $suppress='',$mgl='',$mgr='',$mgt='',$mgb='',$mgh='',$mgf='',$ohname='',$ehname='',$ofname='',$efname='',$ohvalue=0,$ehvalue=0,$ofvalue=0,$efvalue=0,$pagesel='',$newformat='')                    
            $mPDF = Utils::setCommonPrint();
            $mPDF->AddPage('P');
            $mPDF->WriteHTML($invoice);
            $mPDF->Output("invoice.pdf", 'D'); //D=Download
        }
    }

}
