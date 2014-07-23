<?php
/* @var $this HargaController */
/* @var $harga Harga */
/* @var $form CActiveForm */
?>

<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-money"></i>Form Harga
        </div>
        <div class="tools"></div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'harga-form',
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
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($harga, 'KODE_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                        <?php echo $form->dropDownList($harga, 'KODE_TIPE_LAUNDRY', $model->listYetHarga(), array('class' => 'form-control', 'prompt' => '-- Pilih Tipe Laundry --')); ?>
                        <?php echo $form->error($harga, 'KODE_TIPE_LAUNDRY'); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo $form->labelEx($harga, 'NOMINAL_HARGA', array('class' => 'control-label')); ?>
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <?php echo $form->textField($harga, 'NOMINAL_HARGA', array('class' => 'form-control')); ?>
                        </div>
                        <?php echo $form->error($harga, 'NOMINAL_HARGA'); ?>
                    </div>
                </div>
            </div>
            <!--/row-->
            <small><span class="required">*</span>) wajib diisi.</small>
        </div>
        <div class="form-actions center">
            <?php echo CHtml::submitButton('Simpan', array('class' => 'btn blue')); ?>
        </div>

        <?php $this->endWidget(); ?>

        <!-- END FORM-->
    </div>
</div>