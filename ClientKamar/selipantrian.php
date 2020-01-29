<?php
include "koneksi.php";

$TData = $_POST['myData'];
$selip = $_POST['selip'];

foreach($TData as $row) {
	if ($row[0] > $selip) {
		$urutan = $row[0] + 1;
		$sql = "UPDATE QP7ANTRIANA SET Urutan=".$urutan." WHERE Id='".$row[1]."';";
		$sql_execute = sqlsrv_query($conn,$sql);
		$sql = "UPDATE QP7ANTRIANAA SET Urutan=".$urutan." WHERE Id='".$row[1]."';";
		$sql_execute = sqlsrv_query($conn,$sql);
	}
}
?>