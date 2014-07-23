<?php
/* @var $this TipelaundryController */
/* @var $model TipeLaundry */

$this->breadcrumbs=array(
	'Tipe Laundries'=>array('index'),
	$model->KODE_TIPE_LAUNDRY=>array('view','id'=>$model->KODE_TIPE_LAUNDRY),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipeLaundry', 'url'=>array('index')),
	array('label'=>'Create TipeLaundry', 'url'=>array('create')),
	array('label'=>'View TipeLaundry', 'url'=>array('view', 'id'=>$model->KODE_TIPE_LAUNDRY)),
	array('label'=>'Manage TipeLaundry', 'url'=>array('admin')),
);
?>

<h1>Update TipeLaundry <?php echo $model->KODE_TIPE_LAUNDRY; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>