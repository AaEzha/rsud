<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dashboard_grafik($tgl)
{
    $CI =& get_instance();
    $t = explode("-", $tgl);
    $tahun = $t[0];
    $bulan = $t[1];
    $tanggal = $t[2];
    $query = "
            select t.id
            from troubleshooting_tickets t
            join troubleshooting_status s on s.id=t.troubleshootingstatus_id
            where extract(YEAR from t.ticket_date) = '$tahun' and extract(MONTH from t.ticket_date) = '$bulan' and extract(DAY from t.ticket_date) = '$tanggal'
    ";

    $d = $CI->db->query($query);

    $e = $d->num_rows();

    return $e;
    
}

function dashboard_tabel($tgl, $unit)
{
    $CI =& get_instance();
    $t = explode("-", $tgl);
    $tahun = $t[0];
    $bulan = $t[1];
    $tanggal = $t[2];
    $query = "
            select t.id
            from troubleshooting_tickets t
            join troubleshooting_status s on s.id=t.troubleshootingstatus_id
            where extract(YEAR from t.ticket_date) = '$tahun' and extract(MONTH from t.ticket_date) = '$bulan' and extract(DAY from t.ticket_date) = '$tanggal'
            and t.unit_id='$unit'
    ";

    $d = $CI->db->query($query);

    $e = $d->num_rows();

    return $e;
    
}

function inisialNama($name)
{
    $words = explode(' ', $name);
    if (count($words) >= 2) {
        return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    }
    return $this->makeInitialsFromSingleWord($name);
}

function makeInitialsFromSingleWord($name)
{
    preg_match_all('#([A-Z]+)#', $name, $capitals);
    if (count($capitals[1]) >= 2) {
        return substr(implode('', $capitals[1]), 0, 2);
    }
    return strtoupper(substr($name, 0, 2));
}

function rekor_petugas($id, $tipe='0')
{
    $CI =& get_instance();
    if($tipe!=0){
        $query = "
                SELECT uc.id
                FROM    user_accounts uc
                JOIN    user_admin ua on ua.useraccount_id=uc.id
                JOIN    troubleshooting_tickets tt on tt.useradmin_id = ua.id
                JOIN    troubleshootings t on t.troubleshootingticket_id = tt.id
                JOIN    troubleshooting_activities ta on t.troubleshootingactivity_id=ta.id
                WHERE   ua.id='$id' AND ta.id='$tipe'
        ";
    }else{
        $query = "
                SELECT uc.id
                FROM    user_accounts uc
                JOIN    user_admin ua on ua.useraccount_id=uc.id
                JOIN    troubleshooting_tickets tt on tt.useradmin_id = ua.id
                JOIN    troubleshootings t on t.troubleshootingticket_id = tt.id
                JOIN    troubleshooting_activities ta on t.troubleshootingactivity_id=ta.id
                WHERE   ua.id='$id'
        ";
    }
    return $CI->db->query($query)->num_rows();
}

function hari_ini(){
    $hari = date('N');
    $data = ['','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'];
    return $data[$hari];
}

function tiket_detail_area($ruangan, $area)
{
    $CI =& get_instance();

    $this->db->select('rd.id, rd.name as kamar');
    $this->db->from('room_details rd');
    $this->db->join('room_categories rc', 'rc.id = rd.roomcategory_id');
    $this->db->join('room_areas ra', 'ra.id = rd.roomarea_id');
    $this->db->where('ra', $area);
    $this->db->where('rc', $ruangan);
    return $this->db->get()->result();
}
















if ( ! function_exists('date_indo'))
{
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $tanggali = explode(" ", $tanggal);
        $tanggal = $tanggali[0];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun;
    }
}

if ( ! function_exists('time_indo'))
{
    function time_indo($tgl)
    {
        $tg = explode(" ", $tgl);
        $t = explode(":", $tg[1]);
        return $t[0].":".$t[1];
    }
}

if ( ! function_exists('datetime_indo'))
{
    function datetime_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $tanggali = explode(" ", $tanggal);
        $tanggal = $tanggali[0];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.' '.$bulan.' '.$tahun. ' - '. $tanggali[1];
    }
}
  
if ( ! function_exists('bulan'))
{
    function bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

//Format Shortdate
if ( ! function_exists('shortdate_indo'))
{
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'/'.$bulan.'/'.$tahun;
    }
}
  
if ( ! function_exists('short_bulan'))
{
    function short_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if ( ! function_exists('mediumdate_indo'))
{
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal.'-'.$bulan.'-'.$tahun;
    }
}
  
if ( ! function_exists('medium_bulan'))
{
    function medium_bulan($bln)
    {
        switch ($bln)
        {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}
 
//Long date indo Format
if ( ! function_exists('longdate_indo'))
{
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time()+60*60*8);
        $pecah = explode("-",$ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);
  
        $nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
        $nama_hari = "";
        if($nama=="Sunday") {$nama_hari="Minggu";}
        else if($nama=="Monday") {$nama_hari="Senin";}
        else if($nama=="Tuesday") {$nama_hari="Selasa";}
        else if($nama=="Wednesday") {$nama_hari="Rabu";}
        else if($nama=="Thursday") {$nama_hari="Kamis";}
        else if($nama=="Friday") {$nama_hari="Jumat";}
        else if($nama=="Saturday") {$nama_hari="Sabtu";}
        return $nama_hari.', '.$tgl.' '.$bulan.' '.$thn;
    }
}