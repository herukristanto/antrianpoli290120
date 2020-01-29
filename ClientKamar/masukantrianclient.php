<?php
include "koneksi.php";

$TData = $_POST['myData'];

foreach($TData as $row) {
	$sql = "UPDATE QP7ANTRIANA SET baru='x' WHERE Id='".$row[1]."';";
	$sql_execute = sqlsrv_query($conn,$sql);

	$sql = "INSERT INTO QP7ANTRIANAA VALUES(".$row[0].",'".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','');";
	$sql_execute = sqlsrv_query($conn,$sql);
}
?>