<?php
/* @var $this OrderdetailController */
/* @var $model OrderDetail */

$this->breadcrumbs=array(
	'Order Details'=>array('index'),
	$model->KODE_ORDER_DETAIL=>array('view','id'=>$model->KODE_ORDER_DETAIL),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrderDetail', 'url'=>array('index')),
	array('label'=>'Create OrderDetail', 'url'=>array('create')),
	array('label'=>'View OrderDetail', 'url'=>array('view', 'id'=>$model->KODE_ORDER_DETAIL)),
	array('label'=>'Manage OrderDetail', 'url'=>array('admin')),
);
?>

<h1>Update OrderDetail <?php echo $model->KODE_ORDER_DETAIL; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>