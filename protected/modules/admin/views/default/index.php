<?php
/* @var $this DefaultController */
$this->pageTitle = 'Administrator';
$this->breadcrumbs = array(

    );
    ?>

    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue-madison">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo MyFormatter::formatAngka($pelanggan) ?>
                    </div>
                    <div class="desc">
                        Total Pelanggan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red-intense">
                <div class="visual">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo MyFormatter::formatUang($total) ?>
                    </div>
                    <div class="desc">
                        Total Kredit Bulan ini
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-haze">
                <div class="visual">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo MyFormatter::formatAngka($order) ?>
                    </div>
                    <div class="desc">
                        Total Pemesanan
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple-plum">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <?php echo CHtml::link(MyFormatter::formatAngka($hariini), array('hariini/'), array('style' => 'color:white')) ?>
                    </div>
                    <div class="desc">
                        Pemesanan Hari ini
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet solid grey-cararra bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-bar-chart-o"></i>Grafik Transaksi Bulan Ini
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <?php 
                    $this->widget(
                        'chartjs.widgets.ChLine', 
                        array(
                            'width' => 1000,
                            'height' => 300,
                            'htmlOptions' => array(),
                            'labels' => $chart['label'],
                            'datasets' => $chart['dataset'],
                            'options' => array()
                            )
); 
?>
</div>
</div>
<!-- END PORTLET-->
</div>
</div>