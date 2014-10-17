<?php
/* @var $this MonitorController */
/* @var $model Monitor */

$this->breadcrumbs=array(
	'Monitors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Monitor', 'url'=>array('index')),
	array('label'=>'Manage Monitor', 'url'=>array('admin')),
);
?>

<h1>Create Monitor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>