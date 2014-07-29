<?php

/* @var $this TipelaundryController */
/* @var $model TipeLaundry */
$this->pageTitle = "Perbarui Tipe Laundry #$model->NAMA_TIPE_LAUNDRY";
$this->breadcrumbs = array(
    'Tipe Laundry' => array('index'),
    $model->NAMA_TIPE_LAUNDRY => array('view', 'id' => $model->KODE_TIPE_LAUNDRY),
    "Perbarui Tipe Laundry",
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>