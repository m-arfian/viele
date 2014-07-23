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
        <div class="col-md-2">
            <div class="form-group">
                <?php echo $form->label($model, 'KODE_PELANGGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'KODE_PELANGGAN', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'NAMA', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'NAMA', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo $form->label($model, 'ESTIMASI_SELESAI', array('class' => 'control-label')); ?>
                <div class="input-group">
                    <?php echo $form->numberField($model, 'ESTIMASI_SELESAI', array('class' => 'form-control', 'min' => 0)); ?>
                    <span class="input-group-addon">Hari</span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo $form->label($model, 'DISKON', array('class' => 'control-label')); ?>
                <div class="input-group">
                    <?php echo $form->numberField($model, 'DISKON', array('class' => 'form-control', 'min' => 0, 'max' => 100)); ?>
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <?php echo $form->label($model, 'PENGAMBILAN', array('class' => 'control-label')); ?>
                <div class="compactRadioGroup">
                    <?php echo $form->radioButtonList($model, 'PENGAMBILAN', Order::listPengambilan(), array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->label($model, 'KETERANGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textArea($model, 'KETERANGAN', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'TGL_ORDER', array('class' => 'control-label')); ?>
                <div class="input-group date date-picker" data-date-format="dd-mm-yyyy">
                    <?php echo $form->textField($model, 'TGL_ORDER', array('class' => 'form-control', 'readonly' => true)); ?>
                    <span class="input-group-btn"><button class="btn default" type="button"><i class="fa fa-calendar"></i></button></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'STATUS_ORDER', array('class' => 'control-label')); ?>
                <div class="compactRadioGroup">
                    <?php echo $form->radioButtonList($model, 'STATUS_ORDER', Order::listStatus(), array('class' => 'form-control')); ?>
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