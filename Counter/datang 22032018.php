<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
include "koneksi.php";
$timesave = date('H:i:s');
$datesave = date('Y/m/d');
$poli = $_SESSION["poli"];

if (isset($_GET['nomor'])){
	$ndt = $_GET['nomor'];
}

	$sql = "select * from V_QP7ANTRIAN where nomor_antrian='".$ndt."' and Nama_Poli ='".$poli."' and tgl_antrian='".$datesave."'";
	$sql_execute = sqlsrv_query($conn, $sql);
	$isi = sqlsrv_fetch_array($sql_execute, SQLSRV_FETCH_ASSOC);
	$status = $isi['status'];
	$idndt = $isi['id'];

	if (!empty($status)){
		if ($status==0){
			$sql1 = "update QP7ANTRIAN set status = '1', jam_pasien_datang = '".$timesave."' where id='".$idndt."' and tgl_antrian='".$datesave."'";
			$sql_execute1 = sqlsrv_query($conn1,$sql1);
		}elseif($status==1){
			echo "<script>alert('Nomor antrian sudah terupdate')</script>";
		}
	}elseif(empty($status)){
		echo "<script>alert('Nomor antrian tidak ditemukan')</script>";
	}
echo "<script>window.location.href='T_NomorAntrian.php';</script>";
?>