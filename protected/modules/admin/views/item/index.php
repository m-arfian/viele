<?php
/* @var $this ItemController */
/* @var $model Item */

$this->breadcrumbs = array(
    'Manajemen Item',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#item-grid').yiiGridView('update', {
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
                    <i class="fa fa-search"></i>Pencarian Item
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
                    <i class="fa fa-inbox"></i>Data Item
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')); ?>
                    <?php echo CHtml::link('<i class="fa fa-search"></i>', '#', array('class' => 'search-button', 'style' => 'color:white')); ?>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'item-grid',
                    'dataProvider' => $model->search(),
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
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data Item',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data Item ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        'KODE_ITEM',
                        'NAMA_ITEM',
                        'tipe.NAMA_TIPE',
                        array(
                            'class' => 'MyCButtonColumn',
                            'buttons' => array(
                                'delete' => array(
                                    'url' => 'array("nonaktif", "id" => $data->KODE_ITEM, "ajax" => "false")',
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