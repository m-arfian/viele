<?php
/* @var $this MonitorController */
/* @var $model Monitor */
$this->pageTitle = 'Monitoring';
$this->breadcrumbs = array(
    'Monitoring',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#monitor-grid').yiiGridView('update', {
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
                    <i class="fa fa-search"></i>Pencarian Data
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
                    <i class="fa fa-inbox"></i>Monitoring
                </div>
                <div class="tools"></div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'monitor-grid',
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
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data monitor',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data monitor ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        'KODE_MONITOR',
                        'USERNAME',
                        array(
                            'name' => 'TGL_KERJA',
                            'type' => 'tanggal',
                            'value' => '$data->TGL_KERJA'
                        ),
                        'LOGIN',
                        array(
                            'name' => 'TGL_PULANG',
                            'type' => 'tanggal',
                            'value' => '$data->TGL_PULANG'
                        ),
                        'LOGOUT',
                        array(
                            'class' => 'MyCButtonColumn',
                            'template' => '{rekap}',
                            'buttons' => array(
                                'rekap' => array(
                                    'url' => 'array("rekap", "id" => $data->KODE_MONITOR)',
                                    'icon' => '<i class="fa fa-book"></i>',
                                    'visible' => '!empty($data->TGL_PULANG)',
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