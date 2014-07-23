<?php
/* @var $this HargaController */
/* @var $model Harga */
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
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'KODE_HARGA', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'KODE_HARGA', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'KODE_ITEM', array('class' => 'control-label')); ?>
                <?php echo $form->dropDownList($model, 'KODE_ITEM', Item::ListGrup(), array('class' => 'form-control select2me', 'prompt' => '-- Pilih Item --')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'KODE_TIPE_LAUNDRY', array('class' => 'control-label')); ?>
                <?php echo $form->dropDownList($model, 'KODE_TIPE_LAUNDRY', TipeLaundry::listAll(), array('class' => 'form-control', 'prompt' => '-- Pilih Tipe Laundry --')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'NOMINAL_HARGA', array('class' => 'control-label')); ?>
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                    <?php echo $form->textField($model, 'NOMINAL_HARGA', array('class' => 'form-control')); ?>
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