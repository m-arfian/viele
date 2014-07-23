<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle = 'Tambah Pelanggan';
$this->breadcrumbs = array(
    'Manajemen Pelanggan' => array('index'),
    'Tambah Pelanggan',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>