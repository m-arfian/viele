<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle = 'Manajemen Pelanggan';
$this->breadcrumbs = array(
    'Manajemen Pelanggan'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
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
        <div class="portlet box blue search-form" style="display:none">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-search"></i>Pencarian Pelanggan
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <?php $this->renderPartial('_search', array('model' => $model)) ?>
                <!-- END FORM-->
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Data Pelanggan
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')); ?>
                    <?php echo CHtml::link('<i class="fa fa-search"></i>', '#', array('class' => 'search-button')); ?>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'pelanggan-grid',
                    'dataProvider' => $model->searchDesc(),
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
                            'buttons' => array('delete' => array(
                                'url' => 'array("nonaktif", "id" => $data->KODE_PELANGGAN)',
                            ))
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</div>
