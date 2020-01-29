<?php
include "koneksi.php"; 

//// installasi dasar untuk Error
//
////$error = array();
//$cBox = array();
//$cKode = array();
////$id = $_POST['markCb[0]'];
//$tes = $_POST['kode'];
//$tes1 = $_POST['cb'];
////$counter = $_POST['rbcounter'];
$pilihan = $_POST['proses'];

//echo $pilihan;
//
//foreach($_POST['markCb'] as $row){ $id = $row; }

$date_curr = date('Y/m/d 00:00:00');
#get date time current
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d');
$waktu = substr($date,11,8);

//echo $pilihan;
		$queryp7 = "SELECT * FROM QP7TEMPLAST";
		$sqlp7 = sqlsrv_query($conn,$queryp7);
	  	$isip7 = sqlsrv_fetch_array($sqlp7);

	if ( $pilihan == "Complete" ) {
		$P7Complete = $isip7['RuangTimbang'];
		$sql = sqlsrv_query($conn,"UPDATE QP7ANTRIAN SET jam_pasien_timbang_selesai = '".$date."', status = '3' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND nomor_antrian = '".$P7Complete."' AND jam_pasien_panggil is null"); 
		$sql_Complete = sqlsrv_query($conn,"UPDATE QP7TEMPLAST SET RuangTimbang = null"); 
		//panggil function untuk isi tabel kecil
		tabelkecil($P7Complete);}
	elseif ( $pilihan == "Cancel" ) {	
		$P7Cancel = $isip7['RuangTimbang'];  
		$sql = sqlsrv_query($conn,"UPDATE QP7ANTRIAN SET jam_pasien_timbang_selesai = '".$date."', status = '9' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND nomor_antrian = '".$P7Cancel."' AND jam_pasien_panggil is null"); 
		$sql_Cancel = sqlsrv_query($conn,"UPDATE QP7TEMPLAST SET RuangTimbang = null"); }	
	elseif ( $pilihan == "Skip" ) {
		$sql_Skip = sqlsrv_query($conn,"UPDATE QP7TEMPLAST SET RuangTimbang = null"); }		
	//	elseif ( $pilihan == "Complete2" ) {	
//			$lab2Complete = $isilab['Lab2']; 
//			$sql = sqlsrv_query($conn,"UPDATE QLANTRIAN SET jam_lab_selesai = '".$date."', status = '3' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND counter_lab ='2' AND nomor_antrian = '".$lab2Complete."' AND jam_lab_selesai is null");
//			$sql_Complete2 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab2 = null"); }
//		elseif ( $pilihan == "Complete3" ) {	 
//			$lab3Complete = $isilab['Lab3'];
//			$sql = sqlsrv_query($conn,"UPDATE QLANTRIAN SET jam_lab_selesai = '".$date."', status = '3' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND counter_lab ='3' AND nomor_antrian = '".$lab3Complete."' AND jam_lab_selesai is null");
//			$sql_Complete3 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab3 = null"); }
//		elseif ( $pilihan == "Complete4" ) {	
//			$lab4Complete = $isilab['Lab4']; 
//			$sql = sqlsrv_query($conn,"UPDATE QLANTRIAN SET jam_lab_selesai = '".$date."', status = '3' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND counter_lab ='4' AND nomor_antrian = '".$lab4Complete."' AND jam_lab_selesai is null"); 
//			$sql_Complete4 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab4 = null"); }
//		
//		elseif ( $pilihan == "Cancel2" ) {	 
//			$lab2Cancel = $isilab['Lab2'];  
//			$sql = sqlsrv_query($conn,"UPDATE QLANTRIAN SET jam_lab_selesai = '".$date."', status = '9' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND counter_lab ='2' AND nomor_antrian = '".$lab2Cancel."' AND jam_lab_selesai is null"); 
//			$sql_Cancel2 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab2 = null"); }
//		elseif ( $pilihan == "Cancel3" ) {	
//			$lab3Cancel = $isilab['Lab3']; 
//			$sql = sqlsrv_query($conn,"UPDATE QLANTRIAN SET jam_lab_selesai = '".$date."', status = '9' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND counter_lab ='3' AND nomor_antrian = '".$lab3Cancel."' AND jam_lab_selesai is null"); 
//			$sql_Cancel3 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab3 = null"); }
//		elseif ( $pilihan == "Cancel4" ) {
//			$lab4Cancel = $isilab['Lab4'];	 
//			$sql = sqlsrv_query($conn,"UPDATE QLANTRIAN SET jam_lab_selesai = '".$date."', status = '9' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND counter_lab ='4' AND nomor_antrian = '".$lab4Cancel."' AND jam_lab_selesai is null"); 
//			$sql_Cancel4 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab4 = null"); }
//		
//		elseif ( $pilihan == "Skip2" ) {
//			$sql_Skip2 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab2 = null"); }	
//		elseif ( $pilihan == "Skip3" ) {
//			$sql_Skip3 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab3 = null"); }
//		elseif ( $pilihan == "Skip4" ) {
//			$sql_Skip4 = sqlsrv_query($conn,"UPDATE QLTEMPLAST SET Lab4 = null"); }														
//			
			header( "Location: RuangTimbang.php" );  
//}		

//add function untuk isi tabelkecil
//fungsinya untuk urutan nomor antrian kamar
//fungsi running pada saat complete saja  
function tabelkecil($P7Complete){
		include "koneksi.php"; 
		
		$date_curr = date('Y/m/d 00:00:00');
		//deklarasi dinamic parameter untuk ruangan yg lain
		$ruang = substr($P7Complete,0,1);
	
		$queryp1 = "SELECT COUNT(*) as Hasil FROM QP7ANTRIAN".$ruang;
		$sqlp1 = sqlsrv_query($conn1,$queryp1);
	  	$isip1 = sqlsrv_fetch_array($sqlp1);
		
		$queryp2 = "SELECT * FROM QP7ANTRIAN WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND nomor_antrian = '".$P7Complete."' AND jam_pasien_panggil is null";
		$sqlp2 = sqlsrv_query($conn2,$queryp2);
	  	$isip2 = sqlsrv_fetch_array($sqlp2);
		
		$nomor = $isip1['Hasil'] + 1;
		$idnomor = $isip2['id'];
		
		$sql3 = "insert into QP7ANTRIAN".$ruang." values('".$nomor."','".$idnomor."','".$P7Complete."')";
		$sql_execute3 = sqlsrv_query($conn3,$sql3);	
	}

?>
