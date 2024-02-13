<?php
// Load file koneksi.php
include "koneksi.php";
session_start();
if ($_SESSION['status']!="login") {
    header("location:index.php");
}	

// Ambil Data yang Dikirim dari Form
$id=$_POST['id'];
$kode=$_POST['kode'];
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
// Tentukan gaji berdasarkan jabatan
switch ($jabatan) {
    case "Direks / CEO":
        $gaji = 10000000;
        break;
    case "Direktur Utama":
        $gaji = 8000000;
        break;
    case "Bagian Keuangan":
        $gaji = 6000000;
        break;
    case "Bagian Direktur":
        $gaji = 6500000;
        break;
    case "Manager":
        $gaji = 7500000;
        break;
    case "Jabatan Personalia":
        $gaji = 4000000;
        break;
    case "Administrasi dan Pergudangan":
        $gaji = 3500000;
        break;
    case "Divisi Perusahaan Area Regional":
        $gaji = 2500000;
        break;
    default:
        // Gaji default jika jabatan tidak sesuai
        $gaji = 0;
}
$jenis_bonus=$_POST['jenis_bonus'];
switch ($jenis_bonus) {
    case "THR":
        $bonus = 1000000;
        break;
    case "Lembur":
        $bonus = 2000000;
        break;
    case "Tahunan":
        $bonus = 1500000;
        break;
    case "Prestasi":
        $bonus = 3000000;
        break;
    case "Retensi":
        $bonus = 500000;
        break;
    case "Loyalitas":
        $bonus = 700000;
        break;
    case "Kehadiran":
        $bonus = 900000;
        break;
    
    default:
        // Gaji default jika jabatan tidak sesuai
        $bonus = 0;
}
$absen=$_POST['absen'];
switch ($absen) {
    case ($absen > 29):
        $potongan = $gaji + $bonus;
        break;
    case ($absen > 26):
        $potongan = ($gaji + $bonus)*0.9;
        break;
    case ($absen > 23):
        $potongan = ($gaji + $bonus)*0.8;
        break;
    case ($absen > 20):
        $potongan = ($gaji + $bonus)*0.7;
        break;
    case ($absen > 17):
        $potongan = ($gaji + $bonus)*0.6;
        break;
    case ($absen > 14):
        $potongan = ($gaji + $bonus)*0.5;
        break;
    case ($absen > 11):
        $potongan = ($gaji + $bonus)*0.4;
        break;
    case ($absen > 8):
        $potongan = ($gaji + $bonus)*0.3;
        break;
    case ($absen > 5):
        $potongan = ($gaji + $bonus)*0.2;
        break;
    case ($absen > 2):
        $potongan = ($gaji + $bonus)*0.1;
        break;
        default:
        // Gaji default jika jabatan tidak sesuai
        $potongan = 0;
}
$total=($gaji + $bonus ) - $potongan;                                                      
mysqli_query($koneksi, "update data set kode='$kode', namapegawai='$nama', jabatan='$jabatan', gaji='$gaji', jenis_bonus='$jenis_bonus', bonus='$bonus', absen='$absen', potongan='$potongan', total='$total' WHERE id='$id'");
    header("location:view.php?pesan=update");
?>

