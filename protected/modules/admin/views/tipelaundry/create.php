<?php

/* @var $this TipelaundryController */
/* @var $model TipeLaundry */
$this->pageTitle = 'Tambah Tipe Laundry';
$this->breadcrumbs = array(
    'Tipe Laundry' => array('index'),
    'Tambah Tipe Laundry',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>