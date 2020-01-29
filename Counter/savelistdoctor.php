<?php

date_default_timezone_set("Asia/Bangkok");
ini_set('memory_limit', -1);
session_start();
include "koneksi.php";

$TData = $_POST['myData'];
$poli = $_SESSION["poli"];
// $terminal = gethostname();
$terminal = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$username = $_SESSION["username"];
$datesave = date('Y/m/d');
$timesave = date('H:i');

foreach($TData as $row) {
	if ($row[2]==""){

		$query = "select kode from QP7RUANG where Id_Ruang='".$row[1]."'";
		$sql2 = sqlsrv_query($conn, $query);
		$isi = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC);
		$kru = $isi['kode'];

		$query2 = "select count(Id_Ruang) as x from QP7LISTDOCTOR where Id_Ruang='".$row[1]."' and create_date='".$datesave."'";
		$sql3 = sqlsrv_query($conn3, $query2);
		$isi2 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC);
		$nru = $isi2['x'];

		$query3 = "select count(Id_Ruang) as y from QP7LISTDOCTOR where Doctor_Id = '".$row[0]."'and create_date='".$datesave."' and flagstop is null";
		$sql4 = sqlsrv_query($conn4, $query3);
		$isi3 = sqlsrv_fetch_array($sql4, SQLSRV_FETCH_ASSOC);
		$dktc = $isi3['y'];

		if($nru > 0){
			$nru2 = $nru + 1;
			$nru2 = chr($nru2 + 96);
		 	$ru = $kru.$nru2;
		}else{
			$ru = $kru."a";
		}

		if ($dktc == 0){
			$sql1 = "insert into QP7LISTDOCTOR ([Id_Ruang], [Doctor_Id], [kode], [terminal], [start_praktek], [selesai_praktek], [create_by], [create_date], [create_time]) values ('".$row[1]."','".$row[0]."','".$ru."','".$terminal."','','','".$username."','".$datesave."','".$timesave."');";
			$sql_execute1 = sqlsrv_query($conn1,$sql1);
			echo "berhasil";
		}else{
			echo "gagal";
		}
	}
}
?>
