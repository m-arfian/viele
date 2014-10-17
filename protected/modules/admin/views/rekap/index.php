<?php
$this->pageTitle = 'Rekap Transaksi';
$this->breadcrumbs = array(
    'Rekap Transaksi'
);
?>

<div class="row">
    <div class="col-md-6">
    	<?php echo Yii::app()->user->getFlash('info') ?>
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-files"></i>Rekap Transaksi
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'rekap-form',
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
                                <?php echo $form->labelEx($model, 'BULAN', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'BULAN', $model->listBulan(), array('class' => 'form-control', 'prompt' => '-- Pilih Bulan --')); ?>
                                <?php echo $form->error($model,'BULAN'); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'TAHUN', array('class' => 'control-label')); ?>
                                <?php echo $form->dropDownList($model, 'TAHUN', $model->listTahun(), array('class' => 'form-control', 'prompt' => '-- Pilih Tahun --')); ?>
                                <?php echo $form->error($model,'TAHUN'); ?>
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