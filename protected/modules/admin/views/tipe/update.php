<?php
/* @var $this TipeController */
/* @var $model Tipe */

$this->breadcrumbs=array(
	'Tipes'=>array('index'),
	$model->KODE_TIPE=>array('view','id'=>$model->KODE_TIPE),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipe', 'url'=>array('index')),
	array('label'=>'Create Tipe', 'url'=>array('create')),
	array('label'=>'View Tipe', 'url'=>array('view', 'id'=>$model->KODE_TIPE)),
	array('label'=>'Manage Tipe', 'url'=>array('admin')),
);
?>

<h1>Update Tipe <?php echo $model->KODE_TIPE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>