<?php
/* @var $this ItemController */
/* @var $model Item */
$this->pageTitle = "Perbarui Item #$model->NAMA_ITEM";
$this->breadcrumbs = array(
    'Manajemen Item' => array('index'),
    '#' . $model->NAMA_ITEM => array('view', 'id' => $model->KODE_ITEM),
    'Perbarui Item',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>