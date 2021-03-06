<?php
ini_set('memory_limit', -1);
include "koneksi.php";
date_default_timezone_set("Asia/Bangkok");
session_start();
$printer = $_SESSION["printer"];

// rubah yudi
// add poli BC dan SC
if ($printer == "BREAST CENTER"){
	$printer = 'BC';
}elseif ($printer == "SKIN CENTER") {
	$printer = 'SC';
}else{
	$printer = substr($printer, 11);	
}

$idrow= $_GET['idrow'];
$poli = $_SESSION["poli"];
$username = $_SESSION["username"];
$datesave = date('Y/m/d');
$timesave = date('H:i:s');

$datesave2 = date('d/m/Y');

$sql2 = "select * from V_QP7LISTDOCTOR where id='".$idrow."' and create_date='".$datesave."'";
$sql_execute2 = sqlsrv_query($conn, $sql2);
$row2 = sqlsrv_fetch_array($sql_execute2, SQLSRV_FETCH_ASSOC);
$idruang = $row2['Id_Ruang'];
$kode1 = $row2['kode'];
$ruang = $row2['Nama_Ruang'];
$flagstart = $row2['flagstart'];
$docname = $row2['Name'];

$sql = "select * from QP7TEMPLAST2 where Id_Ruang='".$idruang."' and kode='".$kode1."' and tanggal='".$datesave."'";
$sql_execute = sqlsrv_query($conn2,$sql);
$row = sqlsrv_fetch_array($sql_execute, SQLSRV_FETCH_ASSOC);

$noantrianbaru = 0;
$noantrian = $row['nomor'];
$kode = $row['kode'];
$noantrianbaru = $noantrian + 1;

if ($noantrianbaru > 0 && $noantrianbaru < 10){
	$kodeprint = $kode."-0".$noantrianbaru;
}else{
	$kodeprint = $kode."-".$noantrianbaru;
}

	//update tabel besar antrian
if ($flagstart == "X"){
	$sql3 = "insert into QP7ANTRIAN (nomor_antrian,tgl_antrian,status,jam_pasien_ambil_nomor,kode,Id_Ruang) values('".$kodeprint."','".$datesave."','0','".$timesave."','".$kode."','".$idruang."')";
	$sql_execute3 = sqlsrv_query($conn3,$sql3);

	//update tabel templast
	$sql4 = "update QP7TEMPLAST2 set nomor = '".$noantrianbaru."' where Id_Ruang='".$idruang."' and kode='".$kode1."' and tanggal='".$datesave."'";
	$sql_execute4 = sqlsrv_query($conn4,$sql4);

	$docname = substr($docname, 0, 26);

	//print
	//cek database
	$sql2 = "select * from QP7PRINTER where Poli = '".$printer."'";
	$sql_execute2 = sqlsrv_query($conn, $sql2);
	$row2 = sqlsrv_fetch_array($sql_execute2, SQLSRV_FETCH_ASSOC);
	$namaprinter = $row2['Printer'];

	//$handle = printer_open('\\\\172.16.109.221\\POS-58');
	$handle = printer_open($namaprinter);
	printer_start_doc($handle, "Antrian POLI");
	printer_start_page($handle);

	$font1 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font1);

	// rubah yudi
	// add poli BC dan SC
	if ($poli == 'BREAST CENTER'){
		printer_draw_text($handle,"                $poli\n", 0, 0);
	}elseif ($poli == 'SKIN CENTER') {
		printer_draw_text($handle,"                  $poli\n", 0, 0);
	}else{
		printer_draw_text($handle,"                     $poli\n", 0, 0);
	}
	printer_draw_text($handle,"            RS Pantai Indah Kapuk \n", 0, 40);
	printer_delete_font($font1);
	
	$font2 = printer_create_font("Arial Bold", 120, 30, 100, false, false, false, 0);
	printer_select_font($handle, $font2);
	printer_draw_text($handle,"      $kodeprint\n", 0, 80);
	printer_delete_font($font2);
	
	$font3 = printer_create_font("Arial", 30, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font3);
	printer_draw_text($handle,"             $datesave2   $timesave \n", 0, 190);
	printer_delete_font($font3);

	$font4 = printer_create_font("Arial", 40, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font4);
	printer_draw_text($handle,"          $docname \n", 0, 240);
	printer_delete_font($font4);

	$font5 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font5);	
	printer_draw_text($handle,"       Bawa nomor ini saat di panggil \n", 0, 280);
	printer_delete_font($font5);

	// rubah yudi
	// add poli BC dan SC
	if ($poli == 'BREAST CENTER' || $poli == 'SKIN CENTER'){
		$font6 = printer_create_font("Arial", 30, 9, 10, 'ture', false, false, 0);
	}else{
		$font6 = printer_create_font("Arial", 30, 10, 10, 'ture', false, false, 0);
	}

	printer_select_font($handle, $font6);
	printer_draw_text($handle,"(Lapor Ke Petugas Adm $poli)\n", 0, 330);
	printer_delete_font($font6);

	$font7 = printer_create_font("Arial", 30, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font7);
	printer_draw_text($handle,"                 -- Terima Kasih -- \n", 0, 360);
	printer_delete_font($font7);

	$font3 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font3);
	printer_draw_text($handle,"------------------------------------------------------", 0, 390);

	$font1 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font1);

	// rubah yudi
	// add poli BC dan SC
	if ($poli == 'BREAST CENTER'){
		printer_draw_text($handle,"                $poli\n", 0, 420);
	}elseif ($poli == 'SKIN CENTER') {
		printer_draw_text($handle,"                  $poli\n", 0, 420);
	}else{
		printer_draw_text($handle,"                     $poli\n", 0, 420);
	}

	printer_draw_text($handle,"            RS Pantai Indah Kapuk \n", 0, 460);
	printer_delete_font($font1);
	
	$font2 = printer_create_font("Arial Bold", 120, 30, 100, false, false, false, 0);
	printer_select_font($handle, $font2);
	printer_draw_text($handle,"      $kodeprint\n", 0, 500);
	printer_delete_font($font2);
	
	$font3 = printer_create_font("Arial", 30, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font3);
	printer_draw_text($handle,"             $datesave2   $timesave \n", 0, 610);
	printer_delete_font($font3);

	$font4 = printer_create_font("Arial", 40, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font4);
	printer_draw_text($handle,"          $docname \n", 0, 660);
	printer_delete_font($font4);

	$font5 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font5);	
	printer_draw_text($handle,"       Bawa nomor ini saat di panggil \n", 0, 700);
	printer_delete_font($font5);

	// rubah yudi
	// add poli BC dan SC
	if ($poli == 'BREAST CENTER' || $poli == 'SKIN CENTER'){
		$font6 = printer_create_font("Arial", 30, 9, 10, 'ture', false, false, 0);
	}else{
		$font6 = printer_create_font("Arial", 30, 10, 10, 'ture', false, false, 0);
	}

	printer_select_font($handle, $font6);
	printer_draw_text($handle,"(Lapor Ke Petugas Adm $poli)\n", 0, 750);
	printer_delete_font($font6);

	$font7 = printer_create_font("Arial", 30, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font7);
	printer_draw_text($handle,"                 -- Terima Kasih -- \n", 0, 780);
	printer_delete_font($font7);

	printer_end_page($handle);
	printer_end_doc($handle);
	printer_close($handle);
	//-------------------------------------------------------------------------------------------

}else{
	echo "<script>alert('Mohon untuk start terlebih dahulu')</script>";
}

 echo "<script>window.location.href='T_NomorAntrian.php';</script>";

?>