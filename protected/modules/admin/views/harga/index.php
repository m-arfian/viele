<?php
/* @var $this HargaController */
/* @var $model Harga */
$this->pageTitle = 'Manajemen Harga';
$this->breadcrumbs = array(
    'Manajemen Harga'
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#harga-grid').yiiGridView('update', {
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
                    <i class="fa fa-search"></i>Pencarian Harga
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
        <?php echo Yii::app()->user->getFlash('info') ?>
        
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-inbox"></i>Data Harga
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-search"></i>', '#', array('class' => 'search-button', 'style' => 'color:white')); ?>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'harga-grid',
                    'dataProvider' => $model->search(),
                    //styling pagination
                    'pager' => array(
                        'header' => '',
                        'selectedPageCssClass' => 'active',
                        'hiddenPageCssClass' => 'disabled',
                        'htmlOptions' => array('class' => ''),
                    ),
                    'pagerCssClass' => 'pagination',
                    //'summaryCssClass'=>'alert alert-info',
                    //end styling pagination
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data Harga',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data Harga ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        'KODE_HARGA',
                        'item.NAMA_ITEM',
                        'tipelaundry.NAMA_TIPE_LAUNDRY',
                        array(
                            'name' => 'NOMINAL_HARGA',
                            'type' => 'uang',
                            'value' => '$data->NOMINAL_HARGA'
                        ),
                        array(
                            'class' => 'MyCButtonColumn',
                            'buttons' => array(
                                'delete' => array(
                                    'url' => 'array("nonaktif", "id" => $data->KODE_HARGA, "ajax" => "false")',
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