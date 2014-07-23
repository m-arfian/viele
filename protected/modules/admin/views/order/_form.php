<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="row">
    <div class="col-md-12">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-language"></i>Form Order
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'order-form',
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
                                <?php echo $form->labelEx($model, 'KODE_PELANGGAN', array('class' => 'control-label')); ?>
                                <?php echo $form->textField($model, 'KODE_PELANGGAN', array('class' => 'form-control input-small')); ?>
                                <?php echo $form->error($model, 'KODE_PELANGGAN'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'ESTIMASI_SELESAI', array('class' => 'control-label')); ?>
                                <div class="input-group input-small">
                                    <?php echo $form->numberField($model, 'ESTIMASI_SELESAI', array('class' => 'form-control', 'min' => 0)); ?>
                                    <span class="input-group-addon">Hari</span>
                                </div>
                                <?php echo $form->error($model, 'ESTIMASI_SELESAI'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'PENGAMBILAN', array('class' => 'control-label')); ?>
                                <div class="compactRadioGroup">
                                    <?php echo $form->radioButtonList($model, 'PENGAMBILAN', Order::listPengambilan(), array('class' => 'form-control col-md-2')); ?>
                                </div>
                                <?php echo $form->error($model, 'PENGAMBILAN'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'DISKON', array('class' => 'control-label')); ?>
                                <div class="input-group input-small">
                                    <?php echo $form->numberField($model, 'DISKON', array('class' => 'form-control', 'min' => 0, 'max' => 100)); ?>
                                    <span class="input-group-addon">%</span>
                                </div>
                                <?php echo $form->error($model, 'DISKON'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'KETERANGAN', array('class' => 'control-label')); ?>
                                <?php echo $form->textArea($model, 'KETERANGAN', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'KETERANGAN'); ?>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-condensed table-bordered table-striped">
                                <tr><th></th><?php foreach (TipeLaundry::listAll() as $laundry) { echo '<th>'.strtoupper($laundry).'</th>'; } ?></tr>
                                <?php foreach (Tipe::listAll() as $i => $tipe): ?>
                                <tr><th colspan="<?php echo count(TipeLaundry::listAll())+1 ?>"><div class="text-center"><?php echo strtoupper($tipe) ?></div></th></tr>
                                <?php foreach (Item::ListGrupOrder($i) as $dex => $item): ?>
                                <tr>
                                    <td><?php echo $item ?></td>
                                    <?php foreach (TipeLaundry::listAll() as $id => $laundry): ?>
                                    <td> <?php
                                    if(TipeLaundry::cekByItem($id, $dex)) {
                                        $harga = Harga::findAktif($dex, $id);
                                        if($model->isNewRecord)
                                            echo $form->numberField($model->orderdetail, "[$harga->KODE_HARGA]JUMLAH", array(
                                                'class' => 'form-control input-small',
                                                'min' => 0,
                                                'placeholder' => MyFormatter::formatUang($harga->NOMINAL_HARGA)
                                            ));
                                        else {
                                            $value = 0;
                                            foreach ($history as $detail) {
                                                if($detail->harga->KODE_TIPE_LAUNDRY == $id && $detail->harga->KODE_ITEM == $dex) {
                                                    $value = $detail->JUMLAH;
                                                    break;
                                                }
                                            }
                                            
                                            echo $form->numberField($model->orderdetail, "[$harga->KODE_HARGA]JUMLAH", array(
                                                'class' => 'form-control input-small',
                                                'min' => 0,
                                                'placeholder' => MyFormatter::formatUang($harga->NOMINAL_HARGA),
                                                'value' => $value
                                            ));
                                        }
                                    }
                                    ?> </td>
                                    <?php endforeach ?>
                                </tr>
                                <?php endforeach ?>
                                <?php endforeach ?>
                            </table>
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