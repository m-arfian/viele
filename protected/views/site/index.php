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
    
    $('.pelanggan-plus').click(function(){
	$('.new-pelanggan').toggle();
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
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', '#', array('class' => 'pelanggan-plus')); ?>
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
                            <div class="col-md-1">
                                <div class="form-group">
                                    <div class="input-icon">
                                        <i class="fa fa-navicon"></i>
                                        <?php echo $search->textField($pelanggan, 'KODE_PELANGGAN', array('class' => 'form-control', 'placeholder' => 'Kode Pelanggan')); ?>
                                    </div>
                                </div>
                            </div>
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
                                        <i class="fa fa-phone"></i>
                                        <?php echo $search->textField($pelanggan, 'KONTAK', array('class' => 'form-control', 'placeholder' => 'Kontak')); ?>
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
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content table-hover',
                    'columns' => array(
                        array(
                            'name' => 'KODE_PELANGGAN',
                            'type' => 'raw',
                            'value' => 'CHtml::link($data->KODE_PELANGGAN, "#", array("class" => "btn btn-xs btn-success", "onclick" => "pilihkode($data->KODE_PELANGGAN)"))'
                        ),
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
        <div class="portlet box blue new-pelanggan" style="display:none">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Pelanggan Baru
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php $this->renderPartial('_newpelanggan', array('plgbaru' => $plgbaru)) ?>
                <!-- END FORM-->
            </div>
        </div>
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
                                <?php echo $form->labelEx($orderbaru, 'PENGAMBILAN', array('class' => 'control-label')); ?>
                                <div class="compactRadioGroup">
                                    <?php
                                    echo $form->radioButtonList($orderbaru, 'PENGAMBILAN', Order::listPengambilan(), array(
                                        'class' => 'form-control col-md-2',
                                        'onchange' => '
                                                if(this.value == ' . Order::AMBIL . ') {
                                                    $("#Order_BIAYA_ANTAR").attr("value", "0");
                                                    $("#Order_BIAYA_ANTAR").attr("disabled", "dsiabled");
                                                }
                                                else {
                                                    $("#Order_BIAYA_ANTAR").removeAttr("disabled");
                                                }

                                                toggleestimasi(this.value);
                                            '
                                    ));
                                    ?>
                                </div>
                                <?php echo $form->error($orderbaru, 'PENGAMBILAN'); ?>
                            </div>
                            <div class="form-group"  id="estimasi">
                                <?php echo $form->labelEx($orderbaru, 'ESTIMASI_SELESAI', array('class' => 'control-label')); ?>
                                <div class="input-group input-small">
                                    <?php echo $form->numberField($orderbaru, 'ESTIMASI_SELESAI', array('class' => 'form-control', 'min' => 0)); ?>
                                    <span class="input-group-addon">Hari</span>
                                </div>
                                <?php echo $form->error($orderbaru, 'ESTIMASI_SELESAI'); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $form->labelEx($orderbaru, 'BIAYA_ANTAR', array('class' => 'control-label')); ?>
                                <div style="display:none" id="ba_chosen"><p></p></div>
                                <div class="input-group input-small" id="ba_manual">
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

<script>
    $('#pelanggan-grid').hide();
    toggleestimasi(<?php echo $orderbaru->PENGAMBILAN ?>);

    function pilihkode(objek) {
        $('#pelanggan-grid').hide();
        $('#Order_KODE_PELANGGAN').attr('value', objek);
    }

    function toggleestimasi(val) {
        if (val == 3) {
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