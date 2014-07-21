<?php
/* @var $this TipeController */
/* @var $model Tipe */

$this->breadcrumbs=array(
	'Tipes'=>array('index'),
	$model->KODE_TIPE,
);

$this->menu=array(
	array('label'=>'List Tipe', 'url'=>array('index')),
	array('label'=>'Create Tipe', 'url'=>array('create')),
	array('label'=>'Update Tipe', 'url'=>array('update', 'id'=>$model->KODE_TIPE)),
	array('label'=>'Delete Tipe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KODE_TIPE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipe', 'url'=>array('admin')),
);
?>

<h1>View Tipe #<?php echo $model->KODE_TIPE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KODE_TIPE',
		'NAMA_TIPE',
		'STATUS_TIPE',
	),
)); ?>
