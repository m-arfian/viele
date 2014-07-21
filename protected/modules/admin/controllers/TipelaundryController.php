<?php

class TipelaundryController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    // public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'view', 'nonaktif'),
                'users' => array('@'),
                'roles' => array(WebUser::ROLE_ADMIN)
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

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
        $model = new TipeLaundry;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TipeLaundry'])) {
            $model->attributes = $_POST['TipeLaundry'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->KODE_TIPE_LAUNDRY));
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
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TipeLaundry'])) {
            $model->attributes = $_POST['TipeLaundry'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->KODE_TIPE_LAUNDRY));
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
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    
    public function actionNonaktif($id, $ajax = true) {
        $model = $this->loadModel($id);
        $model->STATUS_PELANGGAN = Pelanggan::NONAKTIF;
        $model->update();
        
        if($ajax == false || $_GET['ajax'] == false)
            $this->redirect(array('view', 'id' => $model->KODE_PELANGGAN));
    }

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new TipeLaundry('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TipeLaundry']))
            $model->attributes = $_GET['TipeLaundry'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return TipeLaundry the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = TipeLaundry::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param TipeLaundry $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'tipe-laundry-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
