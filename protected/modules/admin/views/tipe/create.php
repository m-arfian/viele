<?php
/* @var $this TipeController */
/* @var $model Tipe */

$this->breadcrumbs=array(
	'Tipes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipe', 'url'=>array('index')),
	array('label'=>'Manage Tipe', 'url'=>array('admin')),
);
?>

<h1>Create Tipe</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>