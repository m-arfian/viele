<?php
/* @var $this HargaController */
/* @var $model Harga */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-search"></i>Form Harga
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

                <p class="note">Fields with <span class="required">*</span> are required.</p>

                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'KODE_ITEM', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'KODE_ITEM', Item::ListGrup(), array('class' => 'form-control select2me')); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'KODE_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'KODE_TIPE_LAUNDRY', TipeLaundry::listAll(), array('class' => 'form-control', 'prompt' => '-- Pilih Tipe Laundry --')); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'NOMINAL_HARGA', array('class' => 'control-label')); ?>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <?php echo $form->textField($model, 'NOMINAL_HARGA', array('class' => 'form-control')); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
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