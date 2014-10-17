<?php
/* @var $this OrderController */
/* @var $model Order */

$this->breadcrumbs = array(
    'Order Hari ini',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-language"></i>Data Order Hari ini
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('order/create')); ?>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'order-grid',
                    'dataProvider' => $model->searchHariini(),
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
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data Order',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data Order ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        'KODE_ORDER',
                        'KODE_PELANGGAN',
                        array(
                            'name' => 'TGL_ORDER',
                            'type' => 'tanggalwaktu',
                            'value' => '$data->TGL_ORDER'
                        ),
                        array(
                            'name' => 'ESTIMASI_SELESAI',
                            'value' => '$data->ESTIMASI_SELESAI . " hari"'
                        ),
                        array(
                            'name' => 'PENGAMBILAN',
                            'type' => 'raw',
                            'value' => '$data->getPengambilan()'
                        ),
                        /* 'KETERANGAN',*/
                        array(
                            'header' => 'Total',
                            'type' => 'uang',
                            'value' => '$data->getTotal()'
                        ),
                        array(
                            'name' => 'STATUS_ORDER',
                            'type' => 'raw',
                            'value' => '$data->getStatus()'
                        ),
                        array(
                            'class' => 'MyCButtonColumn',
                            'template' => '{pending} {selesai} {diambil}',
                            'buttons' => array(
                                'pending' => array(
                                    'url' => 'array("order/step", "id" => $data->KODE_ORDER)',
                                    'label' => 'Pending order',
                                    'icon' => '<i class="fa fa-circle-o"></i>',
                                    'visible' => '$data->STATUS_ORDER != ' . Order::PENDING,
                                    'click' => 'function(e){
                                        e.preventDefault();
                                        var jawab = confirm("Apa Anda yakin?");
                                        if(jawab) {
                                        $.post($(this).attr("href"), {"val":"' . Order::PENDING . '"});
                                            reloadGrid();
                                        }
                                    }',
                                    'options' => array('class' => 'btn btn-warning btn-xs'),
                                ),
                                'selesai' => array(
                                    'url' => 'array("order/step", "id" => $data->KODE_ORDER)',
                                    'label' => 'Laundry selesai',
                                    'icon' => '<i class="fa fa-check-circle-o"></i>',
                                    'visible' => '$data->STATUS_ORDER != ' . Order::SELESAI,
                                    'click' => 'function(e){
                                        e.preventDefault();
                                        var jawab = confirm("Apa Anda yakin?");
                                        if(jawab) {
                                        $.post($(this).attr("href"), {"val":"' . Order::SELESAI . '"});
                                            reloadGrid();
                                        }
                                    }',
                                    'options' => array('class' => 'btn btn-primary btn-xs'),
                                ),
                                'diambil' => array(
                                    'url' => 'array("order/step", "id" => $data->KODE_ORDER)',
                                    'label' => 'Laundry sudah diambil',
                                    'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                                    'visible' => '$data->STATUS_ORDER != ' . Order::DIAMBIL,
                                    'click' => 'function(e){
                                        e.preventDefault();
                                        var jawab = confirm("Apa Anda yakin?");
                                        if(jawab) {
                                        $.post($(this).attr("href"), {"val":"' . Order::DIAMBIL . '"});
                                            reloadGrid();
                                        }
                                    }',
                                    'options' => array('class' => 'btn btn-success btn-xs'),
                                )
                            )
                        ),
                        array(
                            'class' => 'MyCButtonColumn',
                            'template' => '{view} {update}',
                            'buttons' => array(
                                'view' => array(
                                    'url' => 'array("order/view", "id" => $data->KODE_ORDER)',
                                ),
                                'update' => array(
                                    'url' => 'array("order/update", "id" => $data->KODE_ORDER)',
                                )
                            )
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function reloadGrid() {
        $("#order-grid").yiiGridView.update("order-grid");
    }
</script>