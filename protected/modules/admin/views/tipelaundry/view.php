<?php
/* @var $this TipelaundryController */
/* @var $model TipeLaundry */

$this->breadcrumbs = array(
    'Tipe Laundry' => array('index'),
    $model->NAMA_TIPE_LAUNDRY,
);
?>

<div class="row">
    <div class="col-md-6">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i>Detail Tipe Laundry #<?php echo $model->NAMA_TIPE_LAUNDRY ?>
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')) ?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_TIPE_LAUNDRY)) ?>
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
                            'KODE_TIPE_LAUNDRY',
                            'NAMA_TIPE_LAUNDRY',
                            array(
                                'name' => 'STATUS_TIPE_LAUNDRY',
                                'type' => 'statusaktif',
                                'value' => $model->STATUS_TIPE_LAUNDRY
                            ),
                        ),
                    ));
                    ?>
                </div>

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>
