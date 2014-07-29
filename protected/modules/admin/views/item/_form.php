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
                    <i class="fa fa-inbox"></i>Form Item
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'item-form',
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
                                <?php echo $form->labelEx($model, 'NAMA_ITEM', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'NAMA_ITEM', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model,'NAMA_ITEM'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'KODE_TIPE', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'KODE_TIPE', Tipe::listAll(), array('class' => 'form-control', 'prompt' => '-- Pilih Tipe --')); ?>
                                <?php echo $form->error($model,'KODE_TIPE'); ?>
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