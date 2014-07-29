<?php
/* @var $this ItemController */
/* @var $model Item */
$this->pageTitle = "Detail Item #$model->NAMA_ITEM";
$this->breadcrumbs = array(
    'Manajemen Item' => array('index'),
    '#' . $model->NAMA_ITEM,
);
?>

<div class="row">
    <div class="col-md-6">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i>Detail Item #<?php echo $model->NAMA_ITEM ?>
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')) ?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_ITEM)) ?>
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
                            'KODE_ITEM',
                            'NAMA_ITEM',
                            'tipe.NAMA_TIPE',
                            /* array(
                                'name' => 'STATUS_ITEM',
                                'type' => 'statusaktif',
                                'value' => $model->STATUS_ITEM
                            ), */
                        ),
                    ));
                    ?>
                </div>

                <div class="table-scrollable">
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'harga-grid',
                        'dataProvider' => $listharga->searchByItem($model->KODE_ITEM),
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
                        'summaryText' => '',
                        'emptyText' => '<div class="alert alert-error">Harga belum dimasukkan</div>',
                        'showTableOnEmpty' => false,
                        'itemsCssClass' => 'table table-bordered table-striped table-condensed flip-content',
                        'columns' => array(
                            array(
                                'header' => 'No',
                                'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                            ),
                            'tipelaundry.NAMA_TIPE_LAUNDRY',
                            array(
                                'name' => 'NOMINAL_HARGA',
                                'type' => 'uang',
                                'value' => '$data->NOMINAL_HARGA'
                            ),
                            array(
                                'class' => 'MyCButtonColumn',
                                'template' => '{update} {nonaktif}',
                                'buttons' => array(
                                    'nonaktif' => array(
                                        'url' => 'array("harga/nonaktif", "id" => $data->KODE_HARGA, "ajax" => "false")',
                                        'icon' => '<i class="fa fa-trash-o"></i>',
                                        'click' => 'function(e){
                                            var jawab = confirm("Apa Anda yakin untuk menghapus data ini?");
                                            return jawab;
		                                  }',
                                        'options' => array('class' => 'btn btn-danger btn-xs'),
                                    )
                                )
                            ),
                        ),
                    ));
                    ?>
                </div>

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
    <div class="col-md-6">
        <?php $this->renderPartial('_harga', array('harga' => $harga, 'model' => $model)); ?>
    </div>
</div>