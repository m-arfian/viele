<?php
/* @var $this OrderController */
/* @var $model Order */
$this->pageTitle = "Perbarui Order #$model->KODE_ORDER";
$this->breadcrumbs = array(
    'Manajemen Order' => array('index'),
    '#'.$model->KODE_ORDER => array('view', 'id' => $model->KODE_ORDER),
    'Perbarui Order'
);
?>

<?php $this->renderPartial('_form', array('model' => $model, 'history' => $history)); ?>