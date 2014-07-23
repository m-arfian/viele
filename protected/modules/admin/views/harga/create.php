<?php
/* @var $this HargaController */
/* @var $model Harga */
$this->pageTitle = 'Tambah Harga';
$this->breadcrumbs = array(
    'Manajemen Harga' => array('index'),
    'Tambah Harga',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>