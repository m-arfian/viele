<?php

class OrderController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
     public $layout='//layouts/kasir';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete, step', // we only allow deletion via POST request
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
                'actions' => array('update', 'index', 'view', 'step'),
                'users' => array('@'),
                'roles' => array(WebUser::ROLE_KASIR)
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
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model->orderdetail = new OrderDetail('baru');
        
        $history = OrderDetail::model()->findAllByAttributes(array('KODE_ORDER' => $id));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try{
                    if (!$model->save())
                        throw new Exception;
                    
                    if (!OrderDetail::model()->deleteAll("KODE_ORDER = $id"))
                        throw new Exception;
                    
                    foreach ($_POST['OrderDetail'] as $kd => $detail) {
                        if(!empty($detail['JUMLAH'])) {
                            $od = new OrderDetail('baru');
                            $od->KODE_HARGA = $kd;
                            $od->JUMLAH = $detail['JUMLAH'];
                            $od->KODE_ORDER = $model->KODE_ORDER;
                            $od->REAL_HARGA = Harga::getHargaById($kd);
                            if(!$od->save())
                                throw new Exception;
                        }
                    }
                    
                    $transaction->commit();
                    Yii::app()->user->setFlash('info', Alert::alertSuccess('Order berhasil dimasukkan'));
                    $this->redirect(array('view', 'id' => $model->KODE_ORDER));
                        
                } catch (Exception $ex) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('info', Alert::alertDanger($ex->getMessage()));
                }
            
            }
        }

        $this->render('update', array(
            'model' => $model,
            'history' => $history
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

    /**
     * Manages all models.
     */
    public function actionIndex() {
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('index', array(
            'model' => $model,
        ));
    }
    
    public function actionStep($id) {
        $model = $this->loadModel($id);
        $model->STATUS_ORDER = $_POST['val'];
        $model->update();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Order the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Order $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
