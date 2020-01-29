<?php
session_start();
include "koneksi.php";

//Form Login
$username = $_POST['username'];
$password = $_POST['password'];
$poli = $_POST['poli'];
$printer = $_POST['printer'];

//Encrypt_password
$password = strtoupper($password);
$pwd = 0;
for($i=0;$i<strlen($password);$i++){
	$pwd=$pwd+(ord($password{$i})*(strlen($password)-$i));
}

	// koneksi data base
$que = "SELECT count (*) as hasil FROM QP7USER WHERE User_Id = '".$username."' AND Password = '".$pwd."'";
$sql = sqlsrv_query($conn,$que);
$count = sqlsrv_fetch_array($sql);
$hasil = $count["hasil"];
$user = strip_tags($_POST['username']);
// Apabila username dan password di temukan
if($hasil > 0) {
		$_SESSION["username"]= $username;
		$_SESSION["printer"]= $printer;
		$_SESSION["poli"]= $poli;
		header('location:T_NomorAntrian.php');	
}
else{
	header('Location: login.php');
	exit();	
}
?>