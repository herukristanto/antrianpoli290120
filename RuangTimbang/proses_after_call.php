<?php
include "koneksi.php"; 

$call = $_GET['cmd'];
$nomor = $_GET['nomor'];
$terminal = $_SERVER['REMOTE_ADDR'];

$date_curr = date('Y/m/d 00:00:00');

date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d');
$waktu = substr($date,11,8);

$query = "SELECT * FROM QP7TEMPLAST WHERE terminal='".$terminal."'";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$sql = sqlsrv_query( $conn, $query , $params, $options );
$rs = sqlsrv_fetch_array($sql);

$nomor = $rs['RuangTimbang'];
$id = $rs['id'];

if ($call=="complete") {
    $sql = "UPDATE QP7ANTRIAN SET jam_pasien_timbang_selesai='".$date."', status='3' WHERE id='".$id."'";
    $sql_execute = sqlsrv_query($conn,$sql);

    $sql = "UPDATE QP7TEMPLAST SET RuangTimbang = null, id = null WHERE terminal='".$terminal."'";
    $sql_execute = sqlsrv_query($conn,$sql);
    
    tabelkecil($nomor, $id);
} else if ($call=="cancel") {
    $sql = "UPDATE QP7ANTRIAN SET jam_pasien_timbang_selesai='".$date."', status='9' WHERE id='".$id."'";
    $sql_execute = sqlsrv_query($conn,$sql);

    $sql = "UPDATE QP7TEMPLAST SET RuangTimbang = null, id = null WHERE terminal='".$terminal."'";
    $sql_execute = sqlsrv_query($conn,$sql);
}    

header( "Location: ruangtimbang.php" ); 

function tabelkecil($nomor, $id){
    include "koneksi.php"; 

    $query = "SELECT * FROM QP7ANTRIAN WHERE id='".$id."'";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $sql = sqlsrv_query( $conn, $query , $params, $options );
    $rs = sqlsrv_fetch_array($sql);

    $idruang = $rs['Id_Ruang'];
    $kode = $rs['kode'];

    $query1 = "SELECT COUNT(*) as Hasil FROM QP7ANTRIANA WHERE nomor_antrian like '".$kode."%' AND Id_Ruang='".$idruang."'";
    $sql1 = sqlsrv_query($conn,$query1);
    $rs1 = sqlsrv_fetch_array($sql1);

    $urutan = $rs1['Hasil'] + 1;

    if (isset($nomor)) {
        $sql3 = "INSERT INTO QP7ANTRIANA values('".$urutan."','".$id."','".$idruang."','".$nomor."','x','n','x','y')";
        $sql_execute3 = sqlsrv_query($conn3,$sql3); 
    }

}
?>