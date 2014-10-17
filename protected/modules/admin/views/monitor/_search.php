<?php
/* @var $this MonitorController */
/* @var $model Monitor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'KODE_MONITOR'); ?>
		<?php echo $form->textField($model,'KODE_MONITOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USERNAME'); ?>
		<?php echo $form->textField($model,'USERNAME',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TGL_KERJA'); ?>
		<?php echo $form->textField($model,'TGL_KERJA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOGIN'); ?>
		<?php echo $form->textField($model,'LOGIN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOGOUT'); ?>
		<?php echo $form->textField($model,'LOGOUT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->