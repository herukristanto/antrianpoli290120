<?php
date_default_timezone_set("Asia/Bangkok");
session_start();
include "koneksi.php";

//cek tanggal
$sql4 = "select * from QP7LASTNUMBER";
$sql_execute4 = sqlsrv_query($conn4,$sql4);
$datesave = date('Y/m/d');
$row2 = sqlsrv_fetch_array($sql_execute4, SQLSRV_FETCH_ASSOC);
if (!is_null($row2['tglantrian'])){
	$tgldb = $row2['tglantrian']->format('Y/m/d');
	if($tgldb <> $datesave){
		$sql3 = "update QP7LASTNUMBER set ruangA1=NULL,ruangA2=NULL,ruangA3=NULL,ruangB1=NULL,ruangB2=NULL,ruangB3=NULL,ruangC1=NULL,ruangC2=NULL,ruangC3=NULL,ruangD1=NULL,ruangD2=NULL,ruangD3=NULL,ruangE1=NULL,ruangE2=NULL,ruangE3=NULL,ruangF1=NULL,ruangF2=NULL,ruangF3=NULL,tglantrian=NULL";
		$sql_execute3 = sqlsrv_query($conn3,$sql3);
	}
}

//Function Cek database dan Update database
function savedb($ruang){	
	include "koneksi.php";

	$poli = $_SESSION["poli"];
	$username = $_SESSION["username"];
	$datesave = date('Y/m/d');
	$datesave2 = date('d/m/Y');
	$timesave = date('H:i');
	
	$sql = "select * from QP7LASTNUMBER";
	$sql_execute = sqlsrv_query($conn,$sql);
	$row = sqlsrv_fetch_array($sql_execute, SQLSRV_FETCH_ASSOC);
	
	$sql4 = "select * from QP7LISTDOCTOR where kode='".$ruang."' and create_date='".$datesave."'";
	$sql_execute4 = sqlsrv_query($conn4,$sql4);
	$row4 = sqlsrv_fetch_array($sql_execute4, SQLSRV_FETCH_ASSOC);
	
	//cek list dokter
	if (isset($row4['dokter'])){
		//update lastnumber
		if (is_null($row['ruang'.$ruang])){
			$sql1 = "update QP7LASTNUMBER set ruang$ruang='1',tglantrian='".$datesave."'";
			$sql_execute1 = sqlsrv_query($conn1,$sql1);
			$nomor3 = $ruang."-01";

		}else{
			$nomor = $row['ruang'.$ruang] + 1;
			$sql2 = "update QP7LASTNUMBER set ruang$ruang='".$nomor."',tglantrian='".$datesave."'";
			$sql_execute2 = sqlsrv_query($conn2,$sql2);
			//update tabel besar antrian
			if ($nomor > 1 and $nomor < 10){
				$nomor2 = "0".$nomor; 
			}else{
				$nomor2 = $nomor;
			}
			$nomor3 = $ruang."-".$nomor2;	
		}
		//update tabel besar antrian
		$sql3 = "insert into QP7ANTRIAN (nomor_antrian,tgl_antrian,status,jam_pasien_datang,kode) values('".$nomor3."','".$datesave."','1','".$timesave."','".$ruang."')";
		$sql_execute3 = sqlsrv_query($conn3,$sql3);	
		
		//print label antrian
		//cetak($nomor3,$poli,$datesave2,$timesave,$ruang);
	}
}

function cetak($nomor3,$poli,$datesave2,$timesave,$ruang){
	
	$ruang2 = substr($ruang,0,1);
	switch($ruang2)
	{
		case "A":
			$ruang3 = "Ruang 1";
			break;
		case "B":
			$ruang3 = "Ruang 2";
			break;
		case "C":
			$ruang3 = "Ruang 3";
			break;
		case "D":
			$ruang3 = "Ruang 4";
			break;
		case "E":
			$ruang3 = "Ruang 5";
			break;
		case "F":
			$ruang3 = "Ruang 6";
			break;
	}
	
	$handle = printer_open("EPSON TM-T82 Receipt");
	printer_start_doc($handle, "My Document");
	printer_start_page($handle);
	
	printer_draw_text($handle,"     $poli        |     $poli\n", 0, 0);
	printer_draw_text($handle,"       $ruang3                   $ruang3\n", 0, 0);
	printer_draw_text($handle,"  RS Pantai Indah Kapuk    RS Pantai Indah Kapuk\n", 0, 0);
	printer_draw_text($handle,"\n", 0, 0);
	printer_draw_text($handle,"\n", 0, 0);
	printer_draw_text($handle,"\n", 0, 0);
	
	$font2 = printer_create_font("Arial Bold", 150, 30, 100, false, false, false, 0);
	printer_select_font($handle, $font2);
	printer_draw_text($handle,"   $nomor3         $nomor3\n", 0, 0);
	printer_delete_font($font2);
	
	//printer_create_font ( string $face , int $height , int $width , int $font_weight , bool $italic , bool $underline , bool $strikeout , int $orientation )
	$font3 = printer_create_font("Arial", 30, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font3);
	printer_draw_text($handle,"        $datesave2.$timesave              |          $datesave2.$timesave\n", 0, 250);

	printer_end_page($handle);
	printer_end_doc($handle);
	printer_close($handle);
}

//Cek Ruangan 1
$ruang = $_GET['ruang'];

if ($_GET['ruang'] == "A1"){
	$ruang = "A1";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "A2"){
	$ruang = "A2";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "A3"){
	$ruang = "A3";
	//Update database
	savedb($ruang);
}

//Cek Ruangan 2
$ruang = $_GET['ruang'];

if ($_GET['ruang'] == "B1"){
	$ruang = "B1";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "B2"){
	$ruang = "B2";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "B3"){
	$ruang = "B3";
	//Update database
	savedb($ruang);
}

//Cek Ruangan 3
$ruang = $_GET['ruang'];

if ($_GET['ruang'] == "C1"){
	$ruang = "C1";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "C2"){
	$ruang = "C2";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "C3"){
	$ruang = "C3";
	//Update database
	savedb($ruang);
}

//Cek Ruangan 4
$ruang = $_GET['ruang'];

if ($_GET['ruang'] == "D1"){
	$ruang = "D1";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "D2"){
	$ruang = "D2";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "D3"){
	$ruang = "D3";
	//Update database
	savedb($ruang);
}

//Cek Ruangan 5
$ruang = $_GET['ruang'];

if ($_GET['ruang'] == "E1"){
	$ruang = "E1";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "E2"){
	$ruang = "E2";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "E3"){
	$ruang = "E3";
	//Update database
	savedb($ruang);
}

//Cek Ruangan 6
$ruang = $_GET['ruang'];

if ($_GET['ruang'] == "F1"){
	$ruang = "F1";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "F2"){
	$ruang = "F2";
	//Update database
	savedb($ruang);
}
if ($_GET['ruang'] == "F3"){
	$ruang = "F3";
	//Update database
	savedb($ruang);
}
echo "<script>window.location.href='T_NomorAntrian.php';</script>";
?>