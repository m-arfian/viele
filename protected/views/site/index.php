<?php
/* @var $this SiteController */
$this->pageTitle = 'Home';

Yii::app()->clientScript->registerScript('search', "
    $('.search-form form').submit(function(){
       $('#pelanggan-grid').yiiGridView('update', {
          data: $(this).serialize()
      });
return false;
});
");
?>

<div class="row">
    <div class="col-md-12">
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box red search-form">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-user"></i>Daftar Pelanggan
            </div>
            <div class="tools">
                <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('/pelanggan')) ?>
            </div>
        </div>
        <div class="portlet-body">
            <div class="form-actions ">
                <?php
                $search = $this->beginWidget('CActiveForm', array(
                    'action' => Yii::app()->createUrl($this->route),
                    'method' => 'get',
                    ));
                    ?>

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <?php echo $search->textField($pelanggan, 'NAMA_PELANGGAN', array('class' => 'form-control', 'placeholder' => 'Nama Pelanggan')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-fax"></i>
                                        <?php echo $search->textField($pelanggan, 'KONTAK', array('class' => 'form-control', 'placeholder' => 'Kontak')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope"></i>
                                        <?php echo $search->textField($pelanggan, 'EMAIL', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <?php echo $search->dropDownList($pelanggan, 'KELAMIN', array('L' => 'Laki-laki', 'P' => 'Perempuan'), array('class' => 'form-control', 'prompt' => '-- Jenis Kelamin --')); ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-home"></i>
                                        <?php echo $search->textField($pelanggan, 'ALAMAT_PELANGGAN', array('class' => 'form-control', 'placeholder' => 'Alamat')); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
                            </div>
                        </div>
                        <!--/row-->
                    </div>

                    <?php $this->endWidget(); ?>
                </div>

                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'pelanggan-grid',
                    'dataProvider' => $pelanggan->searchDesc(),
                    //styling pagination
                    'pager' => array(
                        'header' => '',
                        'selectedPageCssClass' => 'paginate_button active',
                        'hiddenPageCssClass' => 'paginate_button disabled',
                        'htmlOptions' => array('class' => 'pagination'),
                    ),
                    'pagerCssClass' => 'pagination',
                    //'summaryCssClass'=>'alert alert-info',
                    //end styling pagination
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data Pelanggan',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data Pelanggan ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        'KODE_PELANGGAN',
                        'NAMA_PELANGGAN',
                        'ALAMAT_PELANGGAN',
                        array(
                            'name' => 'KELAMIN',
                            'type' => 'kelamin',
                            'value' => '$data->KELAMIN'
                            ),
                        'KONTAK',
                        'EMAIL',
                    /* array(
                      'name' => 'STATUS_PELANGGAN',
                      'type' => 'statusaktif',
                      'value' => '$data->STATUS_PELANGGAN'
                      ), */
                    array(
                        'class' => 'MyCButtonColumn',
                        'template' => '{view} {update}',
                        'buttons' => array(
                            'view' => array(
                                'url' => 'array("/pelanggan/view", "id" => $data->KODE_PELANGGAN)'
                                ),
                            'update' => array(
                                'url' => 'array("/pelanggan/update", "id" => $data->KODE_PELANGGAN)'
                                )
                            )
                        )
                    ),
                ));
                ?>
        </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
</div>
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
                                    <?php echo $form->labelEx($orderbaru, 'KODE_PELANGGAN', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($orderbaru, 'KODE_PELANGGAN', array('class' => 'form-control input-small')); ?>
                                    <?php echo $form->error($orderbaru, 'KODE_PELANGGAN'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($orderbaru, 'ESTIMASI_SELESAI', array('class' => 'control-label')); ?>
                                    <div class="input-group input-small">
                                        <?php echo $form->numberField($orderbaru, 'ESTIMASI_SELESAI', array('class' => 'form-control', 'min' => 0)); ?>
                                        <span class="input-group-addon">Hari</span>
                                    </div>
                                    <?php echo $form->error($orderbaru, 'ESTIMASI_SELESAI'); ?>
                                </div>
                                <div class="form-group">
                                <?php echo $form->labelEx($orderbaru, 'PENGAMBILAN', array('class' => 'control-label')); ?>
                                <div class="compactRadioGroup">
                                    <?php echo $form->radioButtonList($orderbaru, 'PENGAMBILAN', Order::listPengambilan(), array(
                                        'class' => 'form-control col-md-2',
                                        'onchange' => '
                                            if(this.value == 2)
                                                $("#Order_BIAYA_ANTAR").removeAttr("disabled");
                                            else {
                                                $("#Order_BIAYA_ANTAR").attr("value", "0");
                                                $("#Order_BIAYA_ANTAR").attr("disabled", "dsiabled");
                                            }
                                        '
                                    )); ?>
                                </div>
                                <?php echo $form->error($orderbaru, 'PENGAMBILAN'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($orderbaru, 'BIAYA_ANTAR', array('class' => 'control-label')); ?>
                                <div class="input-group input-small">
                                    <span class="input-group-addon">Rp</span>
                                    <?php echo $form->textField($orderbaru, 'BIAYA_ANTAR', array('class' => 'form-control', 'disabled' => $orderbaru->PENGAMBILAN == Order::AMBIL)); ?>
                                </div>
                                <?php echo $form->error($orderbaru, 'BIAYA_ANTAR'); ?>
                            </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($orderbaru, 'DISKON', array('class' => 'control-label')); ?>
                                    <div class="input-group input-small">
                                        <?php echo $form->numberField($orderbaru, 'DISKON', array('class' => 'form-control', 'min' => 0, 'max' => 100)); ?>
                                        <span class="input-group-addon">%</span>
                                    </div>
                                    <?php echo $form->error($orderbaru, 'DISKON'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->labelEx($orderbaru, 'KETERANGAN', array('class' => 'control-label')); ?>
                                    <?php echo $form->textArea($orderbaru, 'KETERANGAN', array('class' => 'form-control')); ?>
                                    <?php echo $form->error($orderbaru, 'KETERANGAN'); ?>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <table class="table table-condensed table-bordered table-striped">
                                    <tr><th></th><?php
                                    foreach (TipeLaundry::listAll() as $laundry) {
                                        echo '<th>' . strtoupper($laundry) . '</th>';
                                    }
                                    ?></tr>
                                    <?php foreach (Tipe::listAll() as $i => $tipe): ?>
                                    <tr><th colspan="<?php echo count(TipeLaundry::listAll()) + 1 ?>"><div class="text-center"><?php echo strtoupper($tipe) ?></div></th></tr>
                                    <?php foreach (Item::ListGrupOrder($i) as $dex => $item): ?>
                                    <tr>
                                        <td><?php echo $item ?></td>
                                        <?php foreach (TipeLaundry::listAll() as $id => $laundry): ?>
                                        <td> <?php
                                        if (TipeLaundry::cekByItem($id, $dex)) {
                                            $harga = Harga::findAktif($dex, $id);
                                            echo $form->numberField($orderbaru->orderdetail, "[$harga->KODE_HARGA]JUMLAH", array(
                                                'class' => 'form-control input-small',
                                                'min' => 0,
                                                'placeholder' => MyFormatter::formatUang($harga->NOMINAL_HARGA)
                                                ));
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

<script>
    $('#pelanggan-grid').hide();
</script>