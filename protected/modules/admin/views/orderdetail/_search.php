<?php
/* @var $this OrderdetailController */
/* @var $model OrderDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'KODE_ORDER_DETAIL'); ?>
		<?php echo $form->textField($model,'KODE_ORDER_DETAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KODE_ORDER'); ?>
		<?php echo $form->textField($model,'KODE_ORDER',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KODE_HARGA'); ?>
		<?php echo $form->textField($model,'KODE_HARGA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REAL_HARGA'); ?>
		<?php echo $form->textField($model,'REAL_HARGA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JUMLAH'); ?>
		<?php echo $form->textField($model,'JUMLAH'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DISKON'); ?>
		<?php echo $form->textField($model,'DISKON'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS_ORDER_DETAIL'); ?>
		<?php echo $form->textField($model,'STATUS_ORDER_DETAIL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->