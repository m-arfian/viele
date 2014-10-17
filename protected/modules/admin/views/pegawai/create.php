<?php
/* @var $this PegawaiController */
/* @var $model User */
$this->pageTitle = 'Tambah Pegawai';
$this->breadcrumbs = array(
    'Manajemen Pegawai' => array('index'),
    'Tambah Pegawai',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>