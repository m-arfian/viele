<?php

class SiteController extends Controller {

    public $layout = '//layouts/kasir';
    
    public function filters() {
        return array(
            'accessControl',
        );
    }
    
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('login', 'error', 'logout'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users' => array('@'),
                'roles' => array(WebUser::ROLE_KASIR)
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
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
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $pelanggan = new Pelanggan('search');
        $pelanggan->unsetAttributes();  // clear any default values
        if (isset($_GET['Pelanggan']))
            $pelanggan->attributes = $_GET['Pelanggan'];
        
        $order = new Order('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $order->attributes = $_GET['Order'];
        
        $orderbaru = new Order('baru');
        $orderbaru->orderdetail = new OrderDetail('baru');
        
        if(isset($_GET['plgid']))
            $orderbaru->KODE_PELANGGAN = $_GET['plgid'];
        
        if (isset($_POST['Order'])) {
            $orderbaru->attributes = $_POST['Order'];
            if ($orderbaru->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try{
                    if (!$orderbaru->save())
                        throw new Exception;
                    
                    foreach ($_POST['OrderDetail'] as $kd => $detail) {
                        if(!empty($detail['JUMLAH'])) {
                            $od = new OrderDetail('baru');
                            $od->KODE_HARGA = $kd;
                            $od->JUMLAH = $detail['JUMLAH'];
                            $od->KODE_ORDER = $orderbaru->KODE_ORDER;
                            $od->REAL_HARGA = Harga::getHargaById($kd);
                            if(!$od->save())
                                throw new Exception;
                        }
                    }
                    
                    $transaction->commit();
                    $this->redirect(array('/order/view', 'id' => $orderbaru->KODE_ORDER));
                        
                } catch (Exception $ex) {
                    $transaction->rollback();
                }
            
            }
        }
        
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array(
            'order' => $order,
            'pelanggan' => $pelanggan,
            'orderbaru' => $orderbaru
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = '//layouts/blank';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $this->layout = '//layouts/plain';
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
            if ($model->validate() && $model->login())
                if(WebUser::isAdmin())
                    $this->redirect(array('/admin'));
                else
                    $this->redirect (array('/'));
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

}
