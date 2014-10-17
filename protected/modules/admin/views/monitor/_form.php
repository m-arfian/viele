<?php
/* @var $this MonitorController */
/* @var $model Monitor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'monitor-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KODE_MONITOR'); ?>
		<?php echo $form->textField($model,'KODE_MONITOR'); ?>
		<?php echo $form->error($model,'KODE_MONITOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'USERNAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TGL_KERJA'); ?>
		<?php echo $form->textField($model,'TGL_KERJA'); ?>
		<?php echo $form->error($model,'TGL_KERJA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LOGIN'); ?>
		<?php echo $form->textField($model,'LOGIN'); ?>
		<?php echo $form->error($model,'LOGIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LOGOUT'); ?>
		<?php echo $form->textField($model,'LOGOUT'); ?>
		<?php echo $form->error($model,'LOGOUT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->