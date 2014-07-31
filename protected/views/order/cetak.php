<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>NOTA #<?php echo $model->KODE_ORDER ?></title>
        <style type="text/css">
            @media print {
                body{
                    background: white !important;
                    width: 470px;
                    font-family: arial;
                    height: auto;
                    margin: 0 !important;
                    letter-spacing: 10px;
                    font-size: 15px;
                    padding: 0 !important;
                }
                .logo{
                    font-size: 20px;
                }
                table th{
                    padding: 3px;
                }
                table td{
                    padding: 2.5px;
                }
                .side-border{
                    border: 1px solid #333;
                    padding: 15px;
                }
                .centered{
                    text-align: center !important;
                }
                .righted{
                    text-align: right !important;
                }
                .small-font{
                    font-size: 10px;
                }
                hr{
                    margin: 5px 0px 0px 0px;
                    padding: 0px;
                }
                table.border-bottom td{
                    border-top: 1px solid #ccc;
                }
                .petunjuk{
                    margin-top: 20px;
                    font-size: 10px;
                }
            }
        </style>
    </head>
    <body>
        <div class="centered">
            <div class="logo">VIELE LAUNDRY</div>
            <div>Jl. Wonocolo Sepanjang No 52 Sidoarjo</div>
            <div>087752639514</div>
        </div>
        ----------------------------------------
        <div>
            <table>
                <tr><td>No Nota</td><td>:</td><td><?php echo $model->KODE_ORDER ?></td></tr>
                <tr><td>Tgl Pesan</td><td>:</td><td><?php echo MyFormatter::formatTanggalWaktu($model->TGL_ORDER) ?></td></tr>
            </table>
        </div>
        ----------------------------------------
        <div>
            <table>
                <?php foreach ($model->orderdetail as $i => $detail): ?>
                    <tr><td colspan="3"><?php echo strtoupper($detail->harga->tipelaundry->NAMA_TIPE_LAUNDRY) . ' ' . $detail->harga->item->NAMA_ITEM ?></td></tr>
                    <tr>
                        <td><?php echo $detail->JUMLAH ?> x </td><td><?php echo MyFormatter::formatUang2($detail->REAL_HARGA) ?></td>
                        <td><?php echo MyFormatter::formatUang2($detail->REAL_HARGA * $detail->JUMLAH) ?></td>
                    </tr>
                <?php endforeach ?>
                <tr><td colspan="2">Subtotal :</td><td><?php echo MyFormatter::formatUang2($model->SUBTOTAL) ?></td></tr>
                <tr><td colspan="2">Diskon :</td><td><?php echo $model->DISKON . '%' ?></td></tr>
                <?php // if ($model->BIAYA_ANTAR == Order::ANTAR): ?>
                <tr><td colspan="2">Biaya Antar :</td><td><?php echo MyFormatter::formatUang2($model->BIAYA_ANTAR) ?></td></tr>
                <?php // endif ?>
                <tr><td colspan="2">Total :</td><td><?php echo MyFormatter::formatUang2($model->TOTAL) ?></td></tr>
            </table>
        </div>
        ----------------------------------------
        <div class="centered">
            <p>Terima kasih atas kunjungannya.</p>
        </div>
    </body>
</html>