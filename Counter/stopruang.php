<?php
	include "koneksi.php";
	date_default_timezone_set("Asia/Bangkok");

	$idrow = $_GET['idrow'];
	$timesave = date('H:i:s');
	$datesave = date('Y/m/d');

	$query = "select count(Id_Ruang) as x from QP7LISTDOCTOR where start_praktek <> '00:00:00' and id='".$idrow."' and create_date='".$datesave."'";
	$sql = sqlsrv_query($conn, $query);
	$isi = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
	$nstart = $isi['x'];

	//cek tabel templast2
	$query2 = "select * from QP7LISTDOCTOR where id='".$idrow."' and create_date='".$datesave."'";
	$sql2 = sqlsrv_query($conn2, $query2);
	$isi2 = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC);
	$idru = $isi2['Id_Ruang'];
	$idko = $isi2['kode'];

	$query = "select status from QP7STATUSRUANG where tgl_antrian='".$datesave."' and kode = '".$idko."' and Id_Ruang = '".$idru."'";
	$sql3 = sqlsrv_query($conn3, $query);
	$isi3 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC);
	$tutup = $isi3['status'];

	//cek tabel besar untuk lihat ada antrian gantung apa tidak
	$query3 = "select count(nomor_antrian) as y from QP7ANTRIAN where kode = '".$idko."' and Id_Ruang = '".$idru."' and tgl_antrian = '".$datesave."' and status > 0 and status < 6";
	$sql3 = sqlsrv_query($conn3, $query3);
	$isi3 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC);
	$jumantri = $isi3['y'];

	if ($jumantri == 0){
		if($nstart == 1 && $tutup == 0){
			$sql3 = "UPDATE QP7LISTDOCTOR set selesai_praktek = '".$timesave."', flagstop = 'X' where id = '".$idrow."' and create_date='".$datesave."';";
			$sql_execute3 = sqlsrv_query($conn,$sql3);
			//delete tabel templast2
			$sql4 = "delete from QP7TEMPLAST2 where Id_Ruang = '".$idru."' and kode = '".$idko."' and tanggal = '".$datesave."'";
			$sql_execute4 = sqlsrv_query($conn2,$sql4);
		}else{
			echo "<script>alert('Tutup client kamar terlebih dahulu');</script>";
		}
	}else{
		echo "<script>alert('Masih ada antrian');</script>";
		echo "<script>window.location.href='T_NomorAntrian.php';</script>";
	}
	
	echo "<script>window.location.href='T_NomorAntrian.php';</script>";
?>