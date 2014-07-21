<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>

<body class="page-404-full-page">
    <div class="row">
        <div class="col-md-12 page-404">
            <div class="number">
                <?php echo YII_DEBUG ? $code : 404 ?>
            </div>
            <div class="details">
                <h3>Uups! Anda tersesat?</h3>
                <p>
                    <?php echo CHtml::encode($message); ?><br>
                    
                    <a onclick="history.go(-1);" class="btn btn-info">Kembali ke halaman sebelumnya </a>
                </p>
            </div>
        </div>
    </div>
</body>