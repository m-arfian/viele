<?php
/* @var $this TipelaundryController */
/* @var $model TipeLaundry */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'action' => Yii::app()->createUrl($this->route),
    'method' => 'get',
));
?>

<div class="form-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->label($model, 'KODE_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'KODE_TIPE_LAUNDRY', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->label($model, 'NAMA_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'NAMA_TIPE_LAUNDRY', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo $form->label($model, 'STATUS_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                <div class="compactRadioGroup">
                    <?php echo $form->radioButtonList($model, 'STATUS_TIPE_LAUNDRY', array(TipeLaundry::AKTIF => 'Aktif', TipeLaundry::NONAKTIF => 'Non Aktif'),
                        array('class' => 'form-control', 'prompt' => '-- Pilih Tipe --')); ?>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
</div>
<div class="form-actions center">
    <?php echo CHtml::submitButton('Cari', array('class' => 'btn blue')); ?>
</div>

<?php $this->endWidget(); ?>
