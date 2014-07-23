<?php
/* @var $this HargaController */
/* @var $model Harga */

$this->breadcrumbs=array(
	'Hargas'=>array('index'),
	$model->KODE_HARGA,
);

$this->menu=array(
	array('label'=>'List Harga', 'url'=>array('index')),
	array('label'=>'Create Harga', 'url'=>array('create')),
	array('label'=>'Update Harga', 'url'=>array('update', 'id'=>$model->KODE_HARGA)),
	array('label'=>'Delete Harga', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KODE_HARGA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Harga', 'url'=>array('admin')),
);
?>

<h1>View Harga #<?php echo $model->KODE_HARGA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KODE_HARGA',
		'KODE_ITEM',
		'KODE_TIPE_LAUNDRY',
		'NOMINAL_HARGA',
		'STATUS_HARGA',
	),
)); ?>
