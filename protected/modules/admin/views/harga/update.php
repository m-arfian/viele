<?php

/* @var $this HargaController */
/* @var $model Harga */
$this->pageTitle = "Perbarui Harga #$model->KODE_HARGA";
$this->breadcrumbs = array(
    'Manajemen Harga' => array('index'),
    '#' . $model->KODE_HARGA => array('view', 'id' => $model->KODE_HARGA),
    'Perbarui Harga',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>