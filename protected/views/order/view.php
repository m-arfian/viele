<?php
/* @var $this OrderController */
/* @var $model Order */
$this->pageTitle = "Detail Order #$model->KODE_ORDER";
$this->breadcrumbs = array(
    'Manajemen Order' => array('index'),
    '#' . $model->KODE_ORDER,
);
?>

<div class="row">
    <div class="col-md-12">
        <?php echo Yii::app()->user->getFlash('info') ?>
    </div>
</div><br/>

<div class="row">
    <div class="col-md-6">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i> Detail Order #<?php echo $model->KODE_ORDER ?>
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_ORDER)) ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <?php
                    $this->widget('zii.widgets.CDetailView', array(
                        'data' => $model,
                        'htmlOptions' => array(
                            'class' => 'table table-bordered table-striped',
                        ),
                        'attributes' => array(
                            'KODE_ORDER',
                            'KODE_PELANGGAN',
                            'pelanggan.NAMA_PELANGGAN',
                            array(
                                'name' => 'TGL_ORDER',
                                'type' => 'tanggalwaktu',
                                'value' => $model->TGL_ORDER
                            ),
                            array(
                                'name' => 'ESTIMASI_SELESAI',
                                'value' => $model->ESTIMASI_SELESAI . ' hari'
                            ),
                            array(
                                'name' => 'PENGAMBILAN',
                                'type' => 'raw',
                                'value' => $model->getPengambilan()
                            ),
                            array(
                                'name' => 'DISKON',
                                'value' => $model->DISKON . '%'
                            ),
                            'KETERANGAN',
                            array(
                                'name' => 'STATUS_ORDER',
                                'type' => 'raw',
                                'value' => $model->getStatus()
                            )
                        ),
                    ));
                    ?>
                </div>

            </div>
        <!-- END SAMPLE TABLE PORTLET-->
        </div>
        
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-table"></i> Nota
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form id="calculator" method="get">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label">Total</label>
                            <p class="lead"><?php echo MyFormatter::formatUang($model->getTotal()) ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bayar" class="control-label">Pembayaran</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="number" id="bayar" class="form-control" value="0" name="bayar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kembali" class="control-label">Kembalian</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="number" id="kembali" class="form-control" value="0" readonly="readonly" name="kembali">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions center">
                    <?php echo CHtml::link('Hitung & Cetak Nota', array('/order/cetak', 'id' => $model->KODE_ORDER), array(
                        'class' => 'btn btn-success pull-right print',
                        'id' => 'cetaknota'
                    )) ?>
                </div>

                </form>
                <!-- END FORM-->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-language"></i> Laundry
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-condensed table-bordered">
                        <tr><th></th><?php foreach (TipeLaundry::listAll() as $laundry) { echo '<th>'.strtoupper($laundry).'</th>'; } ?></tr>
                        <?php foreach (Tipe::listAll() as $i => $tipe): ?>
                            <tr><th colspan="<?php echo count(TipeLaundry::listAll()) + 1 ?>"><div class="text-center"><?php echo strtoupper($tipe) ?></div></th></tr>
                        <?php foreach (Item::ListGrupOrder($i) as $dex => $item): ?>
                            <tr>
                                <td><?php echo $item ?></td>
                                <?php foreach (TipeLaundry::listAll() as $id => $laundry): ?>
                                    <td> <?php
                                        if (TipeLaundry::cekByItem($id, $dex)) {
                                            $harga = Harga::findAktif($dex, $id);
                                            $value = 0;
                                            foreach ($model->orderdetail as $detail) {
                                                if ($detail->harga->KODE_TIPE_LAUNDRY == $id && $detail->harga->KODE_ITEM == $dex) {
                                                    $value = $detail->JUMLAH;
                                                    break;
                                                }
                                            }

                                            echo $value;
                                        }
                                        ?> </td>
                                <?php endforeach ?>
                            </tr>
                        <?php endforeach ?>
                    <?php endforeach ?>
                    </table>
                </div><br/>
                <div class="table-scrollable">
                    <table class="table table-condensed table-bordered">
                        <tr><th>Subtotal</th><td><?php echo MyFormatter::formatUang($model->getSubtotal()) ?></td></tr>
                        <tr><th>Diskon</th><td><?php echo $model->DISKON.'%' ?></td></tr>
                        <tr><th>Biaya Tambahan</th><td><?php echo MyFormatter::formatUang($model->BIAYA_ANTAR) ?></td></tr>
                        <tr><th>Total</th><td><?php echo MyFormatter::formatUang($model->getTotal()) ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>

<script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/custom/jquery.printPage.js" type="text/javascript"></script>
<script>
    $(".print").printPage();
    
    $('#cetaknota').click(function() {
        var bayar = $('#bayar').val();
        bayar = bayar.replace('.', '');
        
        var kembali = bayar - <?php echo $model->getTotal() ?>;
        $('#kembali').attr('value', kembali);
        
        $(this).attr('href', $(this).attr('href') + '?bayar=' + bayar + '&kembali=' + kembali);
    });
</script>