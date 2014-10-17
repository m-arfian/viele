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

        $newpl = new Pelanggan('baru');
        if (isset($_POST['Pelanggan'])) {
            $newpl->attributes = $_POST['Pelanggan'];
            if ($newpl->save())
                $this->redirect(array("/site?plgid=$newpl->KODE_PELANGGAN"));
        }

        $order = new Order('search');
        $order->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $order->attributes = $_GET['Order'];

        $orderbaru = new Order('baru');
        $orderbaru->orderdetail = new OrderDetail('baru');

        if (isset($_GET['plgid']))
            $orderbaru->KODE_PELANGGAN = $_GET['plgid'];

        if (isset($_POST['Order'])) {
            $orderbaru->attributes = $_POST['Order'];
            if ($orderbaru->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    if (!$orderbaru->save())
                        throw new Exception;

                    $subtotal = 0;
                    foreach ($_POST['OrderDetail'] as $kd => $detail) {
                        if (!empty($detail['JUMLAH'])) {
                            $od = new OrderDetail('baru');
                            $od->KODE_HARGA = $kd;
                            $od->JUMLAH = $detail['JUMLAH'];
                            $od->KODE_ORDER = $orderbaru->KODE_ORDER;
                            $od->REAL_HARGA = Harga::getHargaById($kd);
                            $subtotal += $od->JUMLAH * $od->REAL_HARGA;
                            if (!$od->save())
                                throw new Exception;
                        }
                    }
                    
                    if($orderbaru->PENGAMBILAN == Order::EXPRESS) {
                        $antarexpress = $orderbaru->getTotal ($subtotal) * Order::NILAI_BA_EXPRESS / 100;
                        if (!$orderbaru->saveAttributes(array('BIAYA_ANTAR' => $antarexpress)))
                            throw new Exception();
                    }
                    
                    $transaction->commit();
                    $this->redirect(array('/order/view', 'id' => $orderbaru->KODE_ORDER));
                } catch (Exception $ex) {
                    $transaction->rollback();
                    echo $ex->getMessage(); exit();
                }
            }
        }

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array(
            'order' => $order,
            'pelanggan' => $pelanggan,
            'orderbaru' => $orderbaru,
            'plgbaru' => $newpl
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
                if (WebUser::isAdmin())
                    $this->redirect(array('/admin'));
                else
                    $this->redirect(array('/site'));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        if (Yii::app()->user->role == WebUser::ROLE_KASIR) {
            $criteria = new CDbCriteria(array(
                'condition' => 'USERNAME like :user and TGL_PULANG is null',
                'params' => array(':user' => Yii::app()->user->nama),
                'order' => 'KODE_MONITOR desc',
            ));
            $monitor = Monitor::model()->find($criteria);
            if($monitor !== null) {
                $monitor->saveAttributes(array('TGL_PULANG' => date('Y-m-d'), 'LOGOUT' => date('H:i:s')));
            }
        }
        
        Yii::app()->user->logout();

        $this->redirect(Yii::app()->homeUrl);
    }

}
