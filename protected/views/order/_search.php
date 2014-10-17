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
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->textField($model, 'TGL_ORDER', array('class' => 'form-control dp', 'data-date-format' => "yyyy-mm-dd", 'placeholder' => 'Dari tanggal')); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->textField($model, 'TGL_ORDER_X', array('class' => 'form-control dp', 'data-date-format' => "yyyy-mm-dd", 'placeholder' => 'Sampai tanggal')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
</div>
<div class="form-actions center">
    <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>