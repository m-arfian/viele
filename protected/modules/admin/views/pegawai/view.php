<?php
/* @var $this PegawaiController */
/* @var $model User */
$this->pageTitle = "Detail Pegawai #$model->USERNAME";
$this->breadcrumbs = array(
    'Users' => array('index'),
    $model->USERNAME,
);
?>

<div class="row">
    <div class="col-md-6">
        <?php echo Yii::app()->user->getFlash('info') ?>
        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-desktop"></i>Detail Pegawai #<?php echo $model->USERNAME ?>
                </div>
                <div class="tools">
                    <?php echo CHtml::link('<i class="fa fa-plus"></i>', array('create')) ?>
                    <?php echo CHtml::link('<i class="fa fa-edit"></i>', array('update', 'id' => $model->USERNAME)) ?>
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
                            'USERNAME',
                            array(
                                'name' => 'ROLE',
                                'type' => 'role',
                                'value' => $model->ROLE
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