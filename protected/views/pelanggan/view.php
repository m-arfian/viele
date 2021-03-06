<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */
$this->pageTitle = "Detail Pelanggan #$model->NAMA_PELANGGAN";
$this->breadcrumbs = array(
    'Manajemen Pelanggan' => array('index'),
    '#' . $model->NAMA_PELANGGAN,
);
?>

<div class="row">
    <div class="col-md-6">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i>Detail Pelanggan #<?php echo $model->NAMA_PELANGGAN ?>
                </div>
                <div class="tools">
                    <?php echo CHtml::link('Gunakan Kode', array("/site?plgid=$model->KODE_PELANGGAN"), array('class' => 'btn btn-info btn-xxs')) ?>
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('index')) ?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->KODE_PELANGGAN)) ?>
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
                            'KODE_PELANGGAN',
                            'NAMA_PELANGGAN',
                            'ALAMAT_PELANGGAN',
                            array(
                                'name' => 'KELAMIN',
                                'type' => 'kelamin',
                                'value' => $model->KELAMIN
                            ),
                            'KONTAK',
                        /* array(
                          'name' => 'STATUS_PELANGGAN',
                          'type' => 'statusaktif',
                          'value' => $model->STATUS_PELANGGAN
                          ), */
                        ),
                    ));
                    ?>
                </div>

            </div>
        </div>
        <!-- END SAMPLE TABLE PORTLET-->
    </div>
</div>