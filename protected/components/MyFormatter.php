<?php

class MyFormatter extends CFormatter {

    public static function formatAngka($value) {
        return number_format($value, 0, ',', '.');
    }

    public static function formatUang($value) {
        return "Rp. " . number_format($value, 0, ',', '.');
    }
    
    public static function formatUang2($value) {
        return number_format($value, 0, ',', '.');
    }

    public static function formatKelamin($value) {
        if ($value == 'L')
            return 'Laki-laki';
        else
            return 'Perempuan';
    }

    public static function formatTanggal($value) {
        if ($value != NULL) {
            $date = explode('-', $value);
            $bulan = '';
            switch ($date[1]) {
                case '01':
                    $bulan = 'Januari';
                    break;
                case '02':
                    $bulan = 'Februari';
                    break;
                case '03':
                    $bulan = 'Maret';
                    break;
                case '04':
                    $bulan = 'April';
                    break;
                case '05':
                    $bulan = 'Mei';
                    break;
                case '06':
                    $bulan = 'Juni';
                    break;
                case '07':
                    $bulan = 'Juli';
                    break;
                case '08':
                    $bulan = 'Agustus';
                    break;
                case '09':
                    $bulan = 'September';
                    break;
                case '10':
                    $bulan = 'Oktober';
                    break;
                case '11':
                    $bulan = 'Nopember';
                    break;
                case '12':
                    $bulan = 'Desember';
                    break;
            }

            return substr($date[2], 0, 2) . ' ' . $bulan . ' ' . $date[0];
        }
    }

    public static function formatTanggalWaktu($value) {
        $date = explode('-', $value);
        $bulan = '';
        switch ($date[1]) {
            case '01':
                $bulan = 'Januari';
                break;
            case '02':
                $bulan = 'Februari';
                break;
            case '03':
                $bulan = 'Maret';
                break;
            case '04':
                $bulan = 'April';
                break;
            case '05':
                $bulan = 'Mei';
                break;
            case '06':
                $bulan = 'Juni';
                break;
            case '07':
                $bulan = 'Juli';
                break;
            case '08':
                $bulan = 'Agustus';
                break;
            case '09':
                $bulan = 'September';
                break;
            case '10':
                $bulan = 'Oktober';
                break;
            case '11':
                $bulan = 'Nopember';
                break;
            case '12':
                $bulan = 'Desember';
                break;
        }

        return substr($date[2], 0, 2) . ' ' . $bulan . ' ' . $date[0] . ' ' . date('H:i', strtotime($value)) . ' WIB';
    }

    public static function formatTanggalWaktu2($value) {
        $date = explode('-', $value);
        
        return substr($date[2], 0, 2) . '-' . $date[1] . '-' . $date[0] . ' ' . date('H:i', strtotime($value)) . ' WIB';
    }
    
    public static function formatRole($value) {
        switch ($value) {
            case WebUser::ROLE_ADMIN:
                return 'Admin';
            case WebUser::ROLE_KASIR:
                return 'Kasir';
        }
    }

    public static function formatStatusAktif($value) {
        if ($value == 1)
            return '<span class="label label-info">Aktif</span>';
        else
            return '<span class="label label-warning">Non aktif</span>';
    }

}
?>