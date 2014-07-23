<?php

/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle = "Perbarui Pelanggan #$model->NAMA_PELANGGAN";
$this->breadcrumbs = array(
    'Manajemen Pelanggan' => array('index'),
    '#' . $model->NAMA_PELANGGAN => array('view', 'id' => $model->KODE_PELANGGAN),
    'Perbarui Pelanggan',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>