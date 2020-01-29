<?php
	include "koneksi.php";
	date_default_timezone_set("Asia/Bangkok");

	$idrow = $_GET['idrow'];
	$timesave = date('H:i:s');
	$datesave = date('Y/m/d');

	$sql3 = "UPDATE QP7LISTDOCTOR set start_praktek = '".$timesave."',flagstart = 'X' where id = '".$idrow."' and create_date='".$datesave."';";
	$sql_execute3 = sqlsrv_query($conn,$sql3);

	$query = "select * from QP7LISTDOCTOR where id='".$idrow."' and create_date='".$datesave."'";
	$sql = sqlsrv_query($conn, $query);
	$isi = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
	$idru = $isi['Id_Ruang'];
	$idko = $isi['kode'];

	$sql4 = "insert into QP7TEMPLAST2 (Id_Ruang,kode,nomor,tanggal) values('".$idru."','".$idko."','0','".$datesave."')";
	$sql_execute4 = sqlsrv_query($conn2,$sql4);

	echo "<script>window.location.href='T_NomorAntrian.php';</script>";
?>