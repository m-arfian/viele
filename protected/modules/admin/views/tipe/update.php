<?php
/* @var $this TipeController */
/* @var $model Tipe */

$this->breadcrumbs = array(
    'Tipe Item' => array('index'),
    $model->NAMA_TIPE => array('view', 'id' => $model->KODE_TIPE),
    'Perbarui Tipe Item',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>