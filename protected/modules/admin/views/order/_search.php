<?php
/* @var $this OrderController */
/* @var $model Order */
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
            <div class="col-md-2">
                <div class="form-group">
                    <?php echo $form->label($model, 'KODE_ORDER', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'KODE_ORDER', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo $form->label($model, 'NAMA', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'NAMA', array('class' => 'form-control')); ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <?php echo $form->label($model, 'TGL_ORDER', array('class' => 'control-label')); ?>
                    <?php echo $form->textField($model, 'TGL_ORDER', array('class' => 'form-control dp', 'data-date-format' => "yyyy-mm-dd")); ?>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
<div class="form-actions center">
    <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>