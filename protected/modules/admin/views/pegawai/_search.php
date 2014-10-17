<?php
/* @var $this PegawaiController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
));
?>

<div class="form-body">
    <div class="row">
        <div class="col-md-1">
            <div class="form-group">
                <?php echo $form->label($model, 'USERNAME', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'USERNAME', array('class' => 'form-control')); ?>
            </div>
        </div>
    </div>
    <!--/row-->
</div>
<div class="form-actions center">
    <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>