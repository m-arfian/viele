<?php
/* @var $this TipelaundryController */
/* @var $model TipeLaundry */

$this->breadcrumbs=array(
	'Tipe Laundries'=>array('index'),
	$model->KODE_TIPE_LAUNDRY,
);

$this->menu=array(
	array('label'=>'List TipeLaundry', 'url'=>array('index')),
	array('label'=>'Create TipeLaundry', 'url'=>array('create')),
	array('label'=>'Update TipeLaundry', 'url'=>array('update', 'id'=>$model->KODE_TIPE_LAUNDRY)),
	array('label'=>'Delete TipeLaundry', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->KODE_TIPE_LAUNDRY),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipeLaundry', 'url'=>array('admin')),
);
?>

<h1>View TipeLaundry #<?php echo $model->KODE_TIPE_LAUNDRY; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'KODE_TIPE_LAUNDRY',
		'NAMA_TIPE_LAUNDRY',
		'STATUS_TIPE_LAUNDRY',
	),
)); ?>
