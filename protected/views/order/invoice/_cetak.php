<!DOCTYPE html>
<html lang="en" >
    <head>
        <title>NOTA #<?php echo $model->KODE_ORDER ?></title>
        <style type="text/css">
            @media print {
                @font-face {
                    font-family: SourceSansPro;
                    src: url(SourceSansPro-Regular.ttf);
                }

                .clearfix:after {
                    content: "";
                    display: table;
                    clear: both;
                }

                a {
                    color: #e67417;
                    text-decoration: none;
                }

                body {
                    position: relative;
                    width: 14.8cm !important;  
                    height: 21cm !important; 
                    margin: 0 auto; 
                    color: #555555;
                    background: #FFFFFF; 
                    font-family: Arial, sans-serif; 
                    font-size: 14px; 
                    font-family: SourceSansPro;
                }

                header {
                    padding: 10px 0;
                    margin-bottom: 20px;
                    border-bottom: 1px solid #AAAAAA;
                }

                #logo {
                    float: left;
                }

                #logo img {
                    height: 125px;
                }

                #company {
                    float: right;
                    margin-top: 22px;
                    text-align: right;
                }


                #details {
                    margin-bottom: 50px;
                }

                #client {
                    padding-left: 6px;
                    border-left: 6px solid #e67417;
                    float: left;
                }

                #client .to {
                    color: #777777;
                }

                h2.name {
                    font-size: 1.4em;
                    font-weight: normal;
                    margin: 0;
                }

                #invoice {
                    float: right;
                    text-align: right;
                }

                #invoice h1 {
                    color: #e67417;
                    font-size: 2.1em;
                    line-height: 1em;
                    font-weight: normal;
                    margin: 0  0 10px 0;
                }

                #invoice .date {
                    font-size: 1.1em;
                    color: #777777;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    border-spacing: 0;
                    margin-bottom: 20px;
                }

                table th,
                table td {
                    padding: 7px;
                    background: #EEEEEE;
                    text-align: center;
                    border-bottom: 1px solid #FFFFFF;
                }

                table th {
                    white-space: nowrap;        
                    font-weight: normal;
                }

                table td {
                    text-align: right;
                }

                table td h3{
                    color: #FFB26A;
                    font-size: 1.2em;
                    font-weight: normal;
                    margin: 0 0 0.2em 0;
                }

                table .no {
                    color: #FFFFFF;
                    font-size: 1.6em;
                    background: #FFB26A;
                }

                table .desc {
                    text-align: left;
                }

                table .unit {
                    background: #DDDDDD;
                }

                table .qty {
                }

                table .total {
                    background: #FFB26A;
                    color: #FFFFFF;
                }

                table td.unit,
                table td.qty,
                table td.total {
                    font-size: 1.2em;
                }

                table tbody tr:last-child td {
                    border: none;
                }

                table tfoot td {
                    padding: 10px 20px;
                    background: #FFFFFF;
                    border-bottom: none;
                    font-size: 1.2em;
                    white-space: nowrap; 
                    border-top: 1px solid #AAAAAA; 
                }

                table tfoot tr:first-child td {
                    border-top: none; 
                }

                table tfoot tr:last-child td {
                    color: #FFB26A;
                    font-size: 1.4em;
                    border-top: 1px solid #FFB26A; 

                }

                table tfoot tr td:first-child {
                    border: none;
                }

                #thanks{
                    font-size: 2em;
                    margin-bottom: 50px;
                }

                #notices{
                    padding-left: 6px;
                    border-left: 6px solid #e67417;  
                }

                #notices .notice {
                    font-size: 1.2em;
                }

                footer {
                    color: #777777;
                    width: 100%;
                    height: 30px;
                    position: absolute;
                    bottom: 0;
                    border-top: 1px solid #AAAAAA;
                    padding: 8px 0;
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <header class="clearfix">
            <div id="logo">
                <img src="/images/logo-baru.png">
            </div>
            <div id="company">
                <h2 class="name">Viele Laundry</h2>
                <div>Jl. Gunungsari 31 – 33, Surabaya, East Java, Indonesia</div>
                <div>031- 5679813</div>
                <div><a href="mailto:vielelaundry@gmail.com">vielelaundry@gmail.com</a></div>
            </div>
        </header>
    <main>
        <div id="details" class="clearfix">
            <div id="client">
                <div class="to">Detail Pelanggan:</div>
                <h2 class="name"><?php echo $model->pelanggan->NAMA_PELANGGAN ?></h2>
                <div class="address"><?php echo $model->pelanggan->ALAMAT_PELANGGAN ?></div>
                <div class="email"><a href="#"><?php echo $model->pelanggan->KONTAK ?></a></div>
            </div>
            <div id="invoice">
                <h1>NO NOTA #<?php echo $model->KODE_ORDER ?></h1>
                <div class="date">Tanggal Pesan: <?php echo MyFormatter::formatTanggalWaktu2($model->TGL_ORDER) ?></div>
                <div class="date"></div>
            </div>
        </div>
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="no">#</th>
                    <th class="desc">DESKRIPSI</th>
                    <th class="unit">HARGA</th>
                    <th class="qty">JUMLAH</th>
                    <th class="total">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model->orderdetail as $i => $detail): ?>
                <tr>
                    <td class="no"><?php echo ($i+1) ?></td>
                    <td class="desc"><h3><?php echo $detail->harga->tipelaundry->NAMA_TIPE_LAUNDRY ?></h3><?php echo $detail->harga->item->NAMA_ITEM ?></td>
                    <td class="unit"><?php echo MyFormatter::formatUang($detail->REAL_HARGA) ?></td>
                    <td class="qty"><?php echo $detail->JUMLAH ?></td>
                    <td class="total"><?php echo MyFormatter::formatUang($detail->REAL_HARGA * $detail->JUMLAH) ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td><?php echo MyFormatter::formatUang($model->SUBTOTAL) ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">BIAYA TAMBAHAN</td>
                    <td><?php echo MyFormatter::formatUang($model->BIAYA_ANTAR) ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">KEMBALI</td>
                    <td><?php echo MyFormatter::formatUang($_GET['kembali']) ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td><?php echo MyFormatter::formatUang($model->TOTAL) ?></td>
                </tr>
            </tfoot>
        </table>
        <div id="thanks">Terima kasih!</div>
        <div id="notices">
            <div>PEMBERITAHUAN:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
    </footer>
</body>
</html>