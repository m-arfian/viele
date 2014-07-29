<?php
/* @var $this TipelaundryController */
/* @var $model TipeLaundry */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-6">
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-tint"></i>Form Tipe Laundry
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">

                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'tipe-laundry-form',
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
                                <?php echo $form->labelEx($model, 'NAMA_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'NAMA_TIPE_LAUNDRY', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'NAMA_TIPE_LAUNDRY'); ?>
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

            </div><!-- form -->
        </div>
    </div>
</div>