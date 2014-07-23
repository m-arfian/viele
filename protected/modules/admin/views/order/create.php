<?php
/* @var $this OrderController */
/* @var $model Order */
$this->pageTitle = 'Tambah Order';
$this->breadcrumbs = array(
    'Manajemen Order' => array('index'),
    'Tambah Order',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>