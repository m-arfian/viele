<?php
/* @var $this TipeController */
/* @var $model Tipe */
$this->pageTitle = 'Tambah Tipe';
$this->breadcrumbs = array(
    'Tipe Item' => array('index'),
    'Tambah Tipe Item',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>