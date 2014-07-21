<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
/* @var $form CActiveForm */
?>

<?php
/* @var $this ItemController */
/* @var $model Item */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Form Pelanggan
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
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
                                <?php echo $form->labelEx($model, 'NAMA_PELANGGAN', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'NAMA_PELANGGAN', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'NAMA_PELANGGAN'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'KONTAK', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'KONTAK', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'KONTAK'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'EMAIL', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'EMAIL', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'EMAIL'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'KELAMIN', array('class' => 'control-label')); ?>
                                <div class="compactRadioGroup">
                                    <?php echo $form->radioButtonList($model, 'KELAMIN', array('L' => 'Laki-laki', 'P' => 'Perempuan'), array('class' => 'form-control', 'prompt' => '-- Pilih Tipe --')); ?>
                                </div>
                                <?php echo $form->error($model,'KELAMIN'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'ALAMAT_PELANGGAN', array('class' => 'control-label')); ?>
                                <?php echo $form->textArea($model, 'ALAMAT_PELANGGAN', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'ALAMAT_PELANGGAN'); ?>
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

                <!-- END FORM-->
            </div>
        </div>
    </div>
</div>