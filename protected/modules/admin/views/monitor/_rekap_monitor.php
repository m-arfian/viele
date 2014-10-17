<table border="1">
    <tr>
        <th colspan="8">VIELE LAUNDRY | Rekap Transaksi <?php echo '[' . $monitor->USERNAME .'] ' .
                MyFormatter::formatTanggalWaktu2($monitor->TGL_KERJA . ' ' . $monitor->LOGIN) . ' - ' .
                MyFormatter::formatTanggalWaktu2($monitor->TGL_PULANG . ' ' . $monitor->LOGOUT) ?></th>
    </tr>
    <tr>
        <th>NO NOTA</th>
        <th>TGL ORDER</th>
        <th>KODE PELANGGAN</th>
        <th>NAMA PELANGGAN</th>
        <th>SUBTOTAL</th>
        <th>DISKON</th>
        <th>BIAYA TAMBAHAN</th>
        <th>TOTAL</th>
    </tr>
    <?php $grandtotal = 0 ?>
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
    <?php $grandtotal += $data->TOTAL ?>
    <?php endforeach ?>
    <tr>
        <th colspan="7">TOTAL PER BULAN</th>
        <th><?php echo MyFormatter::formatUang($grandtotal) ?></th>
    </tr>
</table>