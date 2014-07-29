<?php

class DefaultController extends Controller {

    public function filters() {
        return array(
            'accessControl',
            'postOnly + hapusnotif',
            );
    }
    
    public function accessRules() {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'hapusnotif'),
                'users' => array('@'),
                'roles' => array(WebUser::ROLE_ADMIN)
                ),
            array('deny', // deny all users
                'users' => array('*'),
                ),
            );
    }
    
    public function actionIndex() {
        $criteria = new CDbCriteria;
        $criteria->condition = 'STATUS_ORDER = '.Order::DIAMBIL;
        $criteria->addBetweenCondition('TGL_ORDER', date('Y-m-01',strtotime('this month')), date('Y-m-t',strtotime('this month')));
        $kredit = Order::model()->findAll($criteria);
        $total = 0;
        foreach ($kredit as $k) { $total += $k->TOTAL; }
        
        $order_c = Order::model()->count();
        
        $pelanggan_c = Pelanggan::model()->countByAttributes(array('STATUS_PELANGGAN' => Pelanggan::AKTIF));
        
        $criteria2 = new CDbCriteria;
        $criteria2->condition = 'date(TGL_ORDER) = date(NOW())';
        $hariini = Order::model()->count($criteria2);
        
        $label = array();
        $dataset = array();
        $dayscount = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        for ($i=1; $i <= $dayscount; $i++) { array_push($label, $i); }
        foreach ($label as $day) { array_push($dataset, Order::todayKredit($day, date('m'), date('Y'))); }

        $chart['dataset'] = array(
            array(
                "fillColor" => "rgba(220,220,220,0.5)",
                "strokeColor" => "rgba(220,220,220,1)",
                "pointColor" => "rgba(220,220,220,1)",
                "pointStrokeColor" => "#ffffff",
                "data" => $dataset
            ),
        );

        $chart['label'] = $label;

        $this->render('index', array(
            'total' => $total,
            'order' => $order_c,
            'pelanggan' => $pelanggan_c,
            'hariini' => $hariini,
            'chart' => $chart
        ));
    }
    
    public function actionHapusnotif() {
        $notif = Notifikasi::model()->findAllByAttributes(array('STATUS_NOTIFIKASI' => Notifikasi::UNREAD));
        foreach ($notif as $n) {
            $n->STATUS_NOTIFIKASI = Notifikasi::READ;
            $n->update();
        }
        
        echo true;
    }

}
