<?php
/* @var $this TipeController */
/* @var $model Tipe */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'KODE_TIPE'); ?>
		<?php echo $form->textField($model,'KODE_TIPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NAMA_TIPE'); ?>
		<?php echo $form->textField($model,'NAMA_TIPE',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS_TIPE'); ?>
		<?php echo $form->textField($model,'STATUS_TIPE'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->