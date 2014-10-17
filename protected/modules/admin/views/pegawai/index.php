<?php
/* @var $this PegawaiController */
/* @var $model User */
$this->pageTitle = 'Manajemen Pegawai';
$this->breadcrumbs = array(
    'Manajemen Pegawai',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
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
                    <i class="fa fa-search"></i>Pencarian Pegawai
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
                    <i class="fa fa-user"></i>Data Pegawai
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')); ?>
                    <?php echo CHtml::link('<i class="fa fa-search"></i>', '#', array('class' => 'search-button')); ?>
                </div>
            </div>
            <div class="portlet-body flip-scroll">
                <?php
                $this->widget('zii.widgets.grid.CGridView', array(
                    'id' => 'user-grid',
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
                    'summaryText' => 'Menampilkan {start} - {end} dari {count} data Pegawai',
                    'emptyText' => '<div class="alert alert-error">Tidak ada data Pegawai ditampilkan</div>',
                    'showTableOnEmpty' => false,
                    'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                    'columns' => array(
                        'USERNAME',
                        array(
                            'name' => 'ROLE',
                            'type' => 'role',
                            'value' => '$data->ROLE'
                        ),
                        array(
                            'class' => 'MyCButtonColumn',
                            'buttons' => array(
                                'delete' => array(
                                    'url' => 'array("nonaktif", "val" => $data->USERNAME)',
                                ),
                                'view' => array(
                                    'url' => 'array("view", "val" => $data->USERNAME)',
                                ),
                                'update' => array(
                                    'url' => 'array("update", "val" => $data->USERNAME)',
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