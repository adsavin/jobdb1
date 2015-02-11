<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
            //yii chat
            'yiichat' => array(
                'class' => 'YiiChatAction'
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        if (Yii::app()->user->isGuest) {
            $this->layout = "//layouts/column2_1";
        } else {
            $this->layout = "//layouts/admin_1";
        }
        $hotJobs = JobContent::model()->findAll("hot_job=:hot_job AND id > 39", array("hot_job" => "On")); //modify later        
        $provinces = Province::model()->findAll('1=1 order by id');
        $this->render('index', array(
            "hotJobs" => $hotJobs,
            "provinces" => $provinces,
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionViewJobDetail($id) {
        $this->layout = "//layouts/column1";

        $model = JobContent::model()->findByPk($id);
        $model->count_view++;
        $model->update(array('count_view'));
        $this->render('viewJobDetail', array(
            'model' => $model,
        ));
    }

    public function actionRegister() {
        $this->layout = "//layouts/column1";
        $model = new User;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->user_role = "Member";
            $model->last_login = date("Y-m-d H:i:s");
            $model->active = "Yes";
            $model->user_id = 1; //not important, cause it's self-registration

            $con = Yii::app()->db;
            $trans = $con->beginTransaction();
            try {
                if ($model->validate() && !$model->save()) {
                    throw new Exception(Yii::app()->params["cannotSave"]);
                }
                $role = new Assignments();
                $role->itemname = "Member";
                $role->userid = $model->id;
                $role->data = "s:0:\"\";"; // dont know the meaning, follow the existing one.

                if (!$role->save()) {
                    throw new Exception(Yii::app()->params["cannotSave"]);
                }
                $trans->commit();
                //maintain the session here.
                $model->password = ''; //not store password in session
                Yii::app()->session->add('user', $model);

                $this->redirect(array("/site/login"));
            } catch (Exception $exc) {
                $trans->rollback();
                Yii::app()->user->setFlash('error', Yii::t('app', Yii::app()->params['fixThingsUp']) . $exc);
                if (YII_DEBUG) {
                    echo $exc;
                }
            }
        }
        $this->render("registerForm", array(
            "model" => $model,
        ));
    }

    public function actionMain() {
        $this->layout = "//layouts/admin";

        $this->render("main", array(
        ));
    }

    public function actionAutoCompleteJobTitle($limit = 10) {
        $keyword = trim($_GET['term']);
//        if (Yii::app()->request->isAjaxRequest && isset($keyword) && trim($keyword) != "") {
        $models = JobContent::model()->findAll(array(
            'select' => "distinct job_title",
            'condition' => "job_title LIKE :keyword",
            'order' => 'job_title',
            'limit' => $limit,
            'params' => array(
                ':keyword' => "%$keyword%",
            ),
        ));
//            print_r($models);exit;
        $suggest = array();
        foreach ($models as $model) {
//                $suggest[] = $model->name . ' - ' . $model->code . ' - ' . $model->call_code . '|' . $model->name . '|' . $model->code . '|' . $model->call_code;
            $suggest[] = $model->job_title;
        }
//        print_r(CJSON::encode($suggest));
        return CJSON::encode($suggest);
//        } else {
//            return null;
//        }
    }

    public function actionViewContent($id) {
        $model = Menu::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }

        $this->layout = "//layouts/column2_1";
        $this->render("content", array(
            "model" => $model,
        ));
    }

    public function actionViewSubContent($id) {
        $model = MenuSub::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->layout = "//layouts/column2_2";
        $this->render("content", array(
            "model" => $model,
        ));
    }

    public function actionJobTab($tab, $id) {
//        if (Yii::app()->request->isAjaxRequest) {
        $criteria = new CDbCriteria();
        switch ($tab) {
            case "company":
                $criteria->condition = "company_id=" . $id;
                break;
            case "function":
                $criteria->condition = "job_function_id=" . $id;
                break;
            case "province":
                $criteria->condition = " province_id IS NULL OR province_id=" . $id;
                break;
            default:
                break;
        }

        $dataProvider = new CActiveDataProvider(JobContent::model());
        $dataProvider->criteria = $criteria;
        $dataProvider->pagination = array(
            "pageSize" => "2",
        );
        echo $this->widget('bootstrap.widgets.TbListView', array(
            'id' => "#" . $tab . "_jobtab",
            'dataProvider' => $dataProvider,
            'ajaxUpdate' => true,
            'ajaxUrl' => 'site/jobtab',
            'itemView' => '_view_job',
            "summaryText" => "",
            'pager' => array(
                'firstPageLabel' => '<<',
                'prevPageLabel' => '<',
                'nextPageLabel' => '>',
                'lastPageLabel' => '>>',
//                'maxButtonCount' => '10',
                'header' => '',
            ),
                ), true);
//        }
    }

    public function actionViewCompany($id) {
        $model = Company::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Not Found.');
        }
        if (count($model->jobContents) == 1) {
            $this->redirect(array("site/viewJobDetail", "id" => $model->jobContents[0]->id));
        } else {
            $criteria = new CDbCriteria();
            $criteria->condition = "company_id=" . $id;
            $dataProvider = new CActiveDataProvider(JobContent::model());
            $dataProvider->criteria = $criteria;
            $this->render("viewCompany", array(
                "model" => $model,
                "dataProvider" => $dataProvider,
            ));
        }
    }

    public function actionViewProvince($id) {
        $model = Province::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Not Found.');
        }
        if (count($model->jobContents) == 1) {
            $this->redirect(array("site/viewJobDetail", "id" => $model->jobContents[0]->id));
        } else {
            $criteria = new CDbCriteria();
            $criteria->condition = " province_id=" . $id;
            $dataProvider = new CActiveDataProvider(JobContent::model());
            $dataProvider->criteria = $criteria;
            $this->render("viewProvince", array(
                "model" => $model,
                "dataProvider" => $dataProvider,
            ));
        }
    }

    public function actionCv() {
        $this->layout = "//layouts/cvlayout";
        $this->render("cv");
    }

}
