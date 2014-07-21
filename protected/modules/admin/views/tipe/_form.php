<?php
/* @var $this TipeController */
/* @var $model Tipe */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipe-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NAMA_TIPE'); ?>
		<?php echo $form->textField($model,'NAMA_TIPE',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'NAMA_TIPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATUS_TIPE'); ?>
		<?php echo $form->textField($model,'STATUS_TIPE'); ?>
		<?php echo $form->error($model,'STATUS_TIPE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->