<?php
/* @var $this TipeController */
/* @var $model Tipe */

$this->breadcrumbs = array(
    'Tipe Item' => array('index'),
    $model->NAMA_TIPE,
);
?>

<div class="row">
    <div class="col-md-6">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i>Detail Tipe Item #<?php echo $model->NAMA_TIPE ?>
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')) ?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_TIPE)) ?>
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
                            'KODE_TIPE',
                            'NAMA_TIPE',
                            array(
                                'name' => 'STATUS_TIPE',
                                'type' => 'statusaktif',
                                'value' => $model->STATUS_TIPE
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