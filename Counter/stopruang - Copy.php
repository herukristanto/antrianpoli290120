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

	if($nstart == 1){
		$sql3 = "UPDATE QP7LISTDOCTOR set selesai_praktek = '".$timesave."', flagstop = 'X' where id = '".$idrow."' and create_date='".$datesave."';";
		$sql_execute3 = sqlsrv_query($conn,$sql3);
	}

	$query = "select * from QP7LISTDOCTOR where id='".$idrow."' and create_date='".$datesave."'";
	$sql = sqlsrv_query($conn, $query);
	$isi = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
	$idru = $isi['Id_Ruang'];
	$idko = $isi['kode'];

	$sql4 = "delete from QP7TEMPLAST2 where Id_Ruang = '".$idru."',kode = '".$idko."')";
	$sql_execute4 = sqlsrv_query($conn2,$sql4);

	echo "<script>window.location.href='T_NomorAntrian.php';</script>";
?>