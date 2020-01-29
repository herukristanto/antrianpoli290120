<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
include "koneksi.php";

//Function Cek database dan Update database
function savedb($ruang,$dok,$kode){	
	include "koneksi.php";

	$poli = $_SESSION["poli"];
	$username = $_SESSION["username"];
	$datesave = date('Y/m/d');
	$timesave = date('H:i');
	$terminal = gethostname();
	$Datecurrent = date('Y/m/d');
		
	$sql = "select count(*) as hasil from QP7LISTDOCTOR where create_date = '".$Datecurrent."' and dokter = '".$dok."' and kode = '".$kode."'";
	$sql_execute = sqlsrv_query($conn,$sql);
	$row = sqlsrv_fetch_array($sql_execute, SQLSRV_FETCH_ASSOC);
	
	if($row['hasil'] == 0){
		$sql1 = "insert into QP7LISTDOCTOR (ruang,dokter,create_by,create_date,poliklinik,terminal,kode,create_time) values('".$ruang."','".$dok."','".$username."','".$datesave."','".$poli."','".$terminal."','".$kode."','".$timesave."')";
		$sql_execute1 = sqlsrv_query($conn1,$sql1);
	}
}
//Cek Ruangan 1
if (isset($_POST['MDoctorA1'])){
	if ($_POST['MDoctorA1']<>""){
		$ruang = "Ruang 1";
		$dok = $_POST['MDoctorA1'];
		$kode = "A1";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorA2'])){
	if ($_POST['MDoctorA2']<>""){
		$ruang = "Ruang 1";
		$dok = $_POST['MDoctorA2'];
		$kode = "A2";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorA3'])){
	if ($_POST['MDoctorA3']<>""){
		$ruang = "Ruang 1";
		$dok = $_POST['MDoctorA3'];
		$kode = "A3";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}

//Cek Ruangan 2
if (isset($_POST['MDoctorB1'])){
	if ($_POST['MDoctorB1']<>""){
		$ruang = "Ruang 2";
		$dok = $_POST['MDoctorB1'];
		$kode = "B1";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorB2'])){
	if ($_POST['MDoctorB2']<>""){
		$ruang = "Ruang 2";
		$dok = $_POST['MDoctorB2'];
		$kode = "B2";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorB3'])){
	if ($_POST['MDoctorB3']<>""){
		$ruang = "Ruang 2";
		$dok = $_POST['MDoctorB3'];
		$kode = "B3";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}

//Cek Ruangan 3
if (isset($_POST['MDoctorC1'])){
	if ($_POST['MDoctorC1']<>""){
		$ruang = "Ruang 3";
		$dok = $_POST['MDoctorC1'];
		$kode = "C1";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorC2'])){
	if ($_POST['MDoctorC2']<>""){
		$ruang = "Ruang 3";
		$dok = $_POST['MDoctorC2'];
		$kode = "C2";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorC3'])){
	if ($_POST['MDoctorC3']<>""){
		$ruang = "Ruang 3";
		$dok = $_POST['MDoctorC3'];
		$kode = "C3";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
//Cek Ruangan 4
if (isset($_POST['MDoctorD1'])){
	if ($_POST['MDoctorD1']<>""){
		$ruang = "Ruang 4";
		$dok = $_POST['MDoctorD1'];
		$kode = "D1";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorD2'])){
	if ($_POST['MDoctorD2']<>""){
		$ruang = "Ruang 4";
		$dok = $_POST['MDoctorD2'];
		$kode = "D2";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorD3'])){
	if ($_POST['MDoctorD3']<>""){
		$ruang = "Ruang 4";
		$dok = $_POST['MDoctorD3'];
		$kode = "D3";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
//Cek Ruangan 5
if (isset($_POST['MDoctorE1'])){
	if ($_POST['MDoctorE1']<>""){
		$ruang = "Ruang 5";
		$dok = $_POST['MDoctorE1'];
		$kode = "E1";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorE2'])){
	if ($_POST['MDoctorE2']<>""){
		$ruang = "Ruang 5";
		$dok = $_POST['MDoctorE2'];
		$kode = "E2";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorE3'])){
	if ($_POST['MDoctorE3']<>""){
		$ruang = "Ruang 5";
		$dok = $_POST['MDoctorE3'];
		$kode = "E3";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}

//Cek Ruangan 6
if (isset($_POST['MDoctorF1'])){
	if ($_POST['MDoctorF1']<>""){
		$ruang = "Ruang 6";
		$dok = $_POST['MDoctorF1'];
		$kode = "F1";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorF2'])){
	if ($_POST['MDoctorF2']<>""){
		$ruang = "Ruang 6";
		$dok = $_POST['MDoctorF2'];
		$kode = "F2";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
if (isset($_POST['MDoctorF3'])){
	if ($_POST['MDoctorF3']<>""){
		$ruang = "Ruang 6";
		$dok = $_POST['MDoctorF3'];
		$kode = "F3";
		//Update database
		savedb($ruang,$dok,$kode);
	}
}
echo "<script>window.location.href='T_NomorAntrian.php';</script>";
?>