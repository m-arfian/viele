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
                                <?php echo $form->labelEx($model, 'PENGAMBILAN', array('class' => 'control-label')); ?>
                                <div class="compactRadioGroup">
                                    <?php echo $form->radioButtonList($model, 'PENGAMBILAN', Order::listPengambilan(), array(
                                        'class' => 'form-control col-md-2',
                                        'onchange' => '
                                            if(this.value == 1) {
                                                $("#Order_BIAYA_ANTAR").attr("value", "0");
                                                $("#Order_BIAYA_ANTAR").attr("disabled", "dsiabled");
                                            }
                                            else
                                                $("#Order_BIAYA_ANTAR").removeAttr("disabled");
                                                
                                            toggleestimasi(this.value);
                                        '
                                    )); ?>
                                </div>
                                <?php echo $form->error($model, 'PENGAMBILAN'); ?>
                            </div>
                            <div class="form-group" id="estimasi">
                                <?php echo $form->labelEx($model, 'ESTIMASI_SELESAI', array('class' => 'control-label')); ?>
                                <div class="input-group input-small">
                                    <?php echo $form->numberField($model, 'ESTIMASI_SELESAI', array('class' => 'form-control', 'min' => 0)); ?>
                                    <span class="input-group-addon">Hari</span>
                                </div>
                                <?php echo $form->error($model, 'ESTIMASI_SELESAI'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($model, 'BIAYA_ANTAR', array('class' => 'control-label')); ?>
                                <div style="display:none" id="ba_chosen"><p></p></div>
                                    <div class="input-group input-small" id="ba_manual">
                                    <span class="input-group-addon">Rp</span>
                                    <?php echo $form->textField($model, 'BIAYA_ANTAR', array('class' => 'form-control', 'disabled' => $model->PENGAMBILAN == Order::AMBIL)); ?>
                                </div>
                                <?php echo $form->error($model, 'BIAYA_ANTAR'); ?>
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
                            <div class="portlet box blue-steel">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-thumb-tack"></i>Daftar Laundry
                                    </div>
                                    <div class="tools"></div>
                                </div>
                                <div class="portlet-body">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs">
                                            <?php foreach (Tipe::listAll() as $i => $tipe): ?>
                                                <li class="<?php echo $i == 1 ? 'active' : '' ?>">
                                                    <a href="#overview_<?php echo $i ?>" data-toggle="tab">
                                                        <?php echo strtoupper($tipe) ?> </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <div class="tab-content">
                                            <?php foreach (Tipe::listAll() as $i => $tipe): ?>
                                                <div class="tab-pane <?php echo $i == 1 ? 'active' : '' ?>" id="overview_<?php echo $i ?>">
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed table-bordered table-striped">
                                                            <thead>
                                                                <tr><th></th>
                                                                <?php foreach (TipeLaundry::listAll() as $laundry): ?>
                                                                    <th><?php echo strtoupper($laundry) ?></th>
                                                                <?php endforeach; ?>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach (Item::ListTipeOrder($i) as $dex => $item): ?>
                                                                    <tr>
                                                                        <td><?php echo $item ?></td>
                                                                        <?php foreach (TipeLaundry::listAll() as $id => $laundry): ?>
                                                                            <td> <?php
                                                                                if (TipeLaundry::cekByItem($id, $dex)) {
                                                                                    $harga = Harga::findAktif($dex, $id);
                                                                                    echo $form->numberField($model->orderdetail, "[$harga->KODE_HARGA]JUMLAH", array(
                                                                                        'class' => 'form-control input-small',
                                                                                        'min' => 0,
                                                                                        'placeholder' => MyFormatter::formatUang($harga->NOMINAL_HARGA)
                                                                                    ));
                                                                                }
                                                                                ?> </td>
                                                                        <?php endforeach ?>
                                                                    </tr>
                                                                <?php endforeach ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
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

<?php if($model->isNewRecord): ?>
<script>
    $('#order-form').submit(function() {
        return confirm('Perhatian! Order yang dimasukkan akan tercatat pada data monitor oleh user kasir yang login saat ini. Klik OK untuk melanjutkan')
    });
</script>
<?php endif ?>

<script>
    toggleestimasi(<?php echo $model->PENGAMBILAN ?>);
    
    function toggleestimasi(val) {
        if(val == 3) {
            $("#estimasi").hide();
            $('#Order_ESTIMASI_SELESAI').attr('value', '0');
            $('#ba_manual').hide();
            $('#ba_chosen').html('<p class="text-danger">+<?php echo Order::NILAI_BA_EXPRESS ?>% total laundry</p>').show();
        }
        else {
            $('#ba_manual').show();
            $('#ba_chosen').hide();
            $("#estimasi").show();
        }
    }
</script>