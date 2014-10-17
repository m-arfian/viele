<?php
/* @var $this MonitorController */
/* @var $model Monitor */

$this->breadcrumbs=array(
	'Monitors'=>array('index'),
	$model->KODE_MONITOR,
);

$this->menu=array(
	array('label'=>'List Monitor', 'url'=>array('index')),
	array('label'=>'Create Monitor', 'url'=>array('create')),
	array('label'=>'Update Monitor', 'url'=>array('update', 'id'=>$model->KODE_MONITOR)),
	array('label'=>'Delete Monitor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KODE_MONITOR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Monitor', 'url'=>array('admin')),
);
?>

<h1>View Monitor #<?php echo $model->KODE_MONITOR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KODE_MONITOR',
		'USERNAME',
		'TGL_KERJA',
		'LOGIN',
		'LOGOUT',
	),
)); ?>
