<table border="1">
    <tr>
    <th colspan="8">VIELE LAUNDRY | Rekap Transaksi Bulan <?php echo $model->BULAN . '-' . $model->TAHUN ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TGL ORDER</th>
        <th>KODE PELANGGAN</th>
        <th>NAMA PELANGGAN</th>
        <th>SUBTOTAL</th>
        <th>DISKON</th>
        <th>BIAYA ANTAR</th>
        <th>TOTAL</th>
    </tr>
    <?php foreach ($order as $data): ?>
        <tr>
            <td><?php echo $data->KODE_ORDER ?></td>
            <td><?php echo MyFormatter::formatTanggal($data->TGL_ORDER) ?></td>
            <td><?php echo $data->KODE_PELANGGAN ?></td>
            <td><?php echo $data->pelanggan->NAMA_PELANGGAN ?></td>
            <td><?php echo MyFormatter::formatUang($data->SUBTOTAL) ?></td>
            <td><?php echo $data->DISKON ?></td>
            <td><?php echo MyFormatter::formatUang($data->BIAYA_ANTAR) ?></td>
            <td><?php echo MyFormatter::formatUang($data->TOTAL) ?></td>
        </tr>
    <?php endforeach ?>
</table>