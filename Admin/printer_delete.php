<?php
include 'koneksi.php';
$id = $_GET['namepoli'];
$result = sqlsrv_query($conn, "DELETE FROM QP7PRINTER WHERE Poli='$id'")or die(sqlsrv_errors());

if ( $result )
{
    $something = "Submission successful.";
   echo"<script>
          alert('Data Dengan ID : ".$id."  Berhasil DiHapus');
          window.location.href='printer.php?pesan=hapus';
        </script>";
}
else
{
     $something = "Submission unsuccessful.";
     die( print_r( sqlsrv_errors(), true));
}
$output=$something;

sqlsrv_free_stmt( $result);
sqlsrv_close( $conn);
?>
