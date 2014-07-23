<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
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
                <?php echo $form->label($model, 'KODE_PELANGGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'KODE_PELANGGAN', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'NAMA_PELANGGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'NAMA_PELANGGAN', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'KONTAK', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'KONTAK', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'EMAIL', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'EMAIL', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <?php echo $form->label($model, 'KELAMIN', array('class' => 'control-label')); ?>
                <div class="compactRadioGroup">
                    <?php echo $form->radioButtonList($model, 'KELAMIN', array('L' => 'Laki-laki', 'P' => 'Perempuan'), array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->label($model, 'ALAMAT_PELANGGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textArea($model, 'ALAMAT_PELANGGAN', array('class' => 'form-control')); ?>
            </div>
        </div>
        <!-- <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'STATUS_PELANGGAN', array('class' => 'control-label')); ?>
                <div class="compactRadioGroup">
                    <?php echo $form->radioButtonList($model, 'STATUS_PELANGGAN', array(Pelanggan::AKTIF => 'Aktif', Pelanggan::NONAKTIF => 'Non Aktif'), array('class' => 'form-control')); ?>
                </div>
            </div>
        </div> -->
    </div>
    <!--/row-->
</div>
<div class="form-actions center">
    <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>