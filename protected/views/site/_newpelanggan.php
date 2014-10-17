<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'pelanggan-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnChange' => false,
        'validateOnSubmit' => true
    )
        ));
?>

<div class="form-body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->labelEx($plgbaru, 'NAMA_PELANGGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textField($plgbaru, 'NAMA_PELANGGAN', array('class' => 'form-control')); ?>
                <?php echo $form->error($plgbaru, 'NAMA_PELANGGAN'); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->labelEx($plgbaru, 'KONTAK', array('class' => 'control-label')); ?>
                <?php echo $form->textField($plgbaru, 'KONTAK', array('class' => 'form-control')); ?>
                <?php echo $form->error($plgbaru, 'KONTAK'); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->labelEx($plgbaru, 'ALAMAT_PELANGGAN', array('class' => 'control-label')); ?>
                <?php echo $form->textArea($plgbaru, 'ALAMAT_PELANGGAN', array('class' => 'form-control')); ?>
                <?php echo $form->error($plgbaru, 'ALAMAT_PELANGGAN'); ?>
            </div>
        </div>
    </div>
    <!--/row-->
    <small><span class="required">*</span>) wajib diisi</small>
</div>
<div class="form-actions center">
    <?php echo CHtml::submitButton('Simpan', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>