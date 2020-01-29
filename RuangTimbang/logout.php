<?php
include "koneksi.php";
session_start();
$_SESSION["username"]= '';

$terminal = $_SERVER['REMOTE_ADDR'];

$sql = "UPDATE QP7TEMPLAST SET RuangTimbang=null, id=null, Terminal=null WHERE terminal='".$terminal."'";
$sql_execute = sqlsrv_query($conn,$sql);

if ($sql_execute) {
	echo "<script>
	window.location.href='login.php';
	</script>";
}

?>