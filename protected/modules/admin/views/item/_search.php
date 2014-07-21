<?php
/* @var $this ItemController */
/* @var $model Item */
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
                <?php echo $form->label($model, 'KODE_ITEM', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'KODE_ITEM', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'NAMA_ITEM', array('class' => 'control-label')); ?>
                <?php echo $form->textField($model, 'NAMA_ITEM', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'KODE_TIPE', array('class' => 'control-label')); ?>
                <?php echo $form->dropDownList($model, 'KODE_TIPE', Tipe::listAll(), array('class' => 'form-control', 'prompt' => '-- Pilih Tipe --')); ?>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <?php echo $form->label($model, 'STATUS_ITEM', array('class' => 'control-label')); ?>
                <div class="compactRadioGroup">
                    <?php echo $form->radioButtonList($model, 'STATUS_ITEM', array(Item::AKTIF => 'Aktif', Item::NONAKTIF => 'Non Aktif'),
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