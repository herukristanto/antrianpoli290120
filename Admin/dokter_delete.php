<?php
include 'koneksi.php';
$id = $_GET['dokter_id'];


$result = sqlsrv_query($conn, "DELETE FROM QP7DOCTOR WHERE Doctor_Id='$id'")or die(sqlsrv_errors());
if ( $result )
{
    $something = "Submission successful.";
   echo"<script>
          alert('Data Dengan ID : ".$id."  Berhasil DiHapus');
          window.location.href='dokter.php?pesan=hapus';
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
