<?php
/* @var $this OrderdetailController */
/* @var $model OrderDetail */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-detail-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KODE_ORDER'); ?>
		<?php echo $form->textField($model,'KODE_ORDER',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'KODE_ORDER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KODE_HARGA'); ?>
		<?php echo $form->textField($model,'KODE_HARGA'); ?>
		<?php echo $form->error($model,'KODE_HARGA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REAL_HARGA'); ?>
		<?php echo $form->textField($model,'REAL_HARGA'); ?>
		<?php echo $form->error($model,'REAL_HARGA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JUMLAH'); ?>
		<?php echo $form->textField($model,'JUMLAH'); ?>
		<?php echo $form->error($model,'JUMLAH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DISKON'); ?>
		<?php echo $form->textField($model,'DISKON'); ?>
		<?php echo $form->error($model,'DISKON'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS_ORDER_DETAIL'); ?>
		<?php echo $form->textField($model,'STATUS_ORDER_DETAIL'); ?>
		<?php echo $form->error($model,'STATUS_ORDER_DETAIL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->