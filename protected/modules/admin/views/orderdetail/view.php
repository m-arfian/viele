<?php
/* @var $this OrderdetailController */
/* @var $model OrderDetail */

$this->breadcrumbs=array(
	'Order Details'=>array('index'),
	$model->KODE_ORDER_DETAIL,
);

$this->menu=array(
	array('label'=>'List OrderDetail', 'url'=>array('index')),
	array('label'=>'Create OrderDetail', 'url'=>array('create')),
	array('label'=>'Update OrderDetail', 'url'=>array('update', 'id'=>$model->KODE_ORDER_DETAIL)),
	array('label'=>'Delete OrderDetail', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KODE_ORDER_DETAIL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderDetail', 'url'=>array('admin')),
);
?>

<h1>View OrderDetail #<?php echo $model->KODE_ORDER_DETAIL; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KODE_ORDER_DETAIL',
		'KODE_ORDER',
		'KODE_HARGA',
		'REAL_HARGA',
		'JUMLAH',
		'DISKON',
		'STATUS_ORDER_DETAIL',
	),
)); ?>
