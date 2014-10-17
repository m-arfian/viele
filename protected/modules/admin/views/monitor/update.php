<?php
/* @var $this MonitorController */
/* @var $model Monitor */

$this->breadcrumbs=array(
	'Monitors'=>array('index'),
	$model->KODE_MONITOR=>array('view','id'=>$model->KODE_MONITOR),
	'Update',
);

$this->menu=array(
	array('label'=>'List Monitor', 'url'=>array('index')),
	array('label'=>'Create Monitor', 'url'=>array('create')),
	array('label'=>'View Monitor', 'url'=>array('view', 'id'=>$model->KODE_MONITOR)),
	array('label'=>'Manage Monitor', 'url'=>array('admin')),
);
?>

<h1>Update Monitor <?php echo $model->KODE_MONITOR; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>