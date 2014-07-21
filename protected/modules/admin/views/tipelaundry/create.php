<?php
/* @var $this TipelaundryController */
/* @var $model TipeLaundry */

$this->breadcrumbs=array(
	'Tipe Laundries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipeLaundry', 'url'=>array('index')),
	array('label'=>'Manage TipeLaundry', 'url'=>array('admin')),
);
?>

<h1>Create TipeLaundry</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>