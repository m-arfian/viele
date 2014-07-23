<?php
/* @var $this ItemController */
/* @var $model Item */
$this->pageTitle = 'Tambah Item';
$this->breadcrumbs = array(
    'Manajemen Item' => array('index'),
    'Tambah Item',
);
?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>