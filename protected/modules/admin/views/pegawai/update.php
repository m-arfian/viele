<?php

/* @var $this PegawaiController */
/* @var $model User */
$this->pageTitle = "Perbarui Pegawai #$model->USERNAME";
$this->breadcrumbs = array(
    'Manajemen Pegawai' => array('index'),
    $model->USERNAME => array('view', 'val' => $model->USERNAME),
    'Perbarui Pegawai',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>