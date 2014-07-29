<?php

class RekapController extends Controller {

    public function filters() {
        return array(
            'accessControl',
            );
    }
    
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users' => array('@'),
                'roles' => array(WebUser::ROLE_ADMIN)
                ),
            array('deny', // deny all users
                'users' => array('*'),
                ),
            );
    }
    
    public function actionIndex() {
        $model = new FormRekap;

        if(isset($_POST['FormRekap'])) {
            $model->attributes = $_POST['FormRekap'];
            $datestart = date('Y-m-d', strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));
            $dateend = date('Y-m-t',strtotime($model->TAHUN.'-'.$model->BULAN.'-01'));

            $criteria = new CDbCriteria;
            $criteria->addBetweenCondition('TGL_ORDER', $datestart, $dateend);

            $order = Order::model()->findAll($criteria);

            if($order != null) {
                $filename = 'REKAP_'.$model->BULAN.'-'.$model->TAHUN;
                header("Cache-Control: no-cache, no-store, must-revalidate");
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=" . $filename . ".xls");

                $this->renderPartial('_rekap_bulanan',array(
                    'order' => $order,
                    'model' => $model
                ));

                exit();
            }

            else {
                Yii::app()->user->setFlash('info', Alert::alertDanger('Rekap belum tersedia untuk bulan tersebut'));
            }
        }
        
        $this->render('index', array(
            'model' => $model,
        ));
    }

}
