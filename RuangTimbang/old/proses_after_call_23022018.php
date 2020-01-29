<?php
include "koneksi.php"; 

$call = $_GET['cmd'];
$id = $_GET['id'];

//echo $call;
//echo "<br>";
//echo $id;

//$pilihan = $_POST['proses'];

$date_curr = date('Y/m/d 00:00:00');
#get date time current
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d');
$waktu = substr($date,11,8);

        $queryp7 = "SELECT * FROM QP7TEMPLAST";
        $sqlp7 = sqlsrv_query($conn,$queryp7);
        $isip7 = sqlsrv_fetch_array($sqlp7);

    if ( $call == "complete" ) { //echo "masuk complete";
        $P7Complete = $isip7['RuangTimbang'];
        $sql = sqlsrv_query($conn,"UPDATE QP7ANTRIAN SET jam_pasien_timbang_selesai = '".$date."', status = '3' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND nomor_antrian = '".$P7Complete."' AND jam_pasien_panggil is null"); 
        $sql_Complete = sqlsrv_query($conn,"UPDATE QP7TEMPLAST SET RuangTimbang = null"); 
        tabelkecil($P7Complete);}
    elseif ( $call == "cancel" ) { //echo "masuk cancel";   
        $P7Cancel = $isip7['RuangTimbang'];  
        $sql = sqlsrv_query($conn,"UPDATE QP7ANTRIAN SET jam_pasien_timbang_selesai = '".$date."', status = '9' WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND nomor_antrian = '".$P7Cancel."' AND jam_pasien_panggil is null"); 
        $sql_Cancel = sqlsrv_query($conn,"UPDATE QP7TEMPLAST SET RuangTimbang = null"); }   
    elseif ( $call == "skip" ) { //echo "masuk skip";
        $sql_Skip = sqlsrv_query($conn,"UPDATE QP7TEMPLAST SET RuangTimbang = null"); }     
                                                            
            header( "Location: RuangTimbang.php" );  

function tabelkecil($P7Complete){
        include "koneksi.php"; 
        
        $date_curr = date('Y/m/d 00:00:00');
        $ruang = substr($P7Complete,0,1);
    
        $queryp1 = "SELECT COUNT(*) as Hasil FROM QP7ANTRIANA".$ruang;
        $sqlp1 = sqlsrv_query($conn1,$queryp1);
        $isip1 = sqlsrv_fetch_array($sqlp1);
        
        $queryp2 = "SELECT * FROM QP7ANTRIAN WHERE tgl_antrian = CONVERT(DATETIME,'".$date_curr."', 102) AND nomor_antrian = '".$P7Complete."' AND jam_pasien_panggil is null";
        $sqlp2 = sqlsrv_query($conn2,$queryp2);
        $isip2 = sqlsrv_fetch_array($sqlp2);
        
        $nomor = $isip1['Hasil'] + 1;
        $idnomor = $isip2['id'];
	$idruang = $isip2['Id_Ruang'];
	//$kode = $isip2['kode'];

        
        $sql3 = "INSERT INTO QP7ANTRIANA values('".$nomor."','".$idnomor."','".$idruang."','".$P7Complete."')";
        $sql_execute3 = sqlsrv_query($conn3,$sql3); 
    }

?>

