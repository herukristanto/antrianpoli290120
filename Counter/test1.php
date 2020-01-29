<?php
include "koneksi.php";
$printer = 1;

	$sql2 = "select * from QP7PRINTER where Poli = '".$printer."'";
	$sql_execute2 = sqlsrv_query($conn, $sql2);
	$row2 = sqlsrv_fetch_array($sql_execute2, SQLSRV_FETCH_ASSOC);
	$namaprinter = $row2['Printer'];

	//$handle = printer_open('\\\\172.16.109.165\\EPSON82');
	$handle = printer_open($namaprinter);
	printer_start_doc($handle, "My Document");
	printer_start_page($handle);

	//$handle = printer_open('\\\\172.16.109.221\\POS-58');
	$handle = printer_open($namaprinter);
	printer_start_doc($handle, "Antrian POLI");
	printer_start_page($handle);

	$font3 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font3);
	printer_draw_text($handle,"                     $poli\n", 0, 0);
	//printer_draw_text($handle,"                          $ruang \n", 0, 40);
	printer_draw_text($handle,"            $docname \n", 0, 40);
	printer_draw_text($handle,"            RS Pantai Indah Kapuk \n", 0, 90);
	
	$font2 = printer_create_font("Arial Bold", 120, 30, 100, false, false, false, 0);
	printer_select_font($handle, $font2);
	printer_draw_text($handle,"      $kodeprint\n", 0, 130);
	printer_delete_font($font2);
	
	$font3 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	printer_select_font($handle, $font3);
	printer_draw_text($handle,"            $datesave2   $timesave \n", 0, 240);

	// //------------------------------------------------------------------------------------------------
	// $font3 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	// printer_select_font($handle, $font3);
	// printer_draw_text($handle,"------------------------------------------------------", 0, 300);
	// printer_draw_text($handle,"                     $poli\n", 0, 360);
	// // printer_draw_text($handle,"                          $ruang \n", 0, 400);
	// printer_draw_text($handle,"            $docname \n", 0, 400);
	// printer_draw_text($handle,"            RS Pantai Indah Kapuk \n", 0, 450);
	
	// $font2 = printer_create_font("Arial Bold", 110, 30, 100, false, false, false, 0);
	// printer_select_font($handle, $font2);
	// printer_draw_text($handle,"      $kodeprint\n", 0, 490);
	// printer_delete_font($font2);
	
	// $font3 = printer_create_font("Arial", 50, 10, 10, false, false, false, 0);
	// printer_select_font($handle, $font3);
	// printer_draw_text($handle,"            $datesave2   $timesave \n", 0, 600);


	// printer_end_page($handle);
	// printer_end_doc($handle);
	// printer_close($handle);
	// //-------------------------------------------------------------------------------------------
?>