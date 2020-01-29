<?php
session_start();
include "koneksi.php";

//Form Login
$username = $_POST['username'];
$password = $_POST['password'];
$poli = $_POST['poli'];


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
	// if ($user == "admin"){
			//session_start();
			//session_register("username");
			//session_register("password");
		$_SESSION["username"]= $username;
			//$_SESSION["password"]= $r[password];
		$_SESSION["poli"]= $poli;
		header('location:RuangTimbang.php');
	// }
	// else{
	// 		//session_start();
	// 		//session_register("username");
	// 		//session_register("password");
	// 	$_SESSION["username"]= $username;
	// 		//$_SESSION["password"]= $r[password];
	// 	$_SESSION["poli"]= $poli;
	// 	header('RuangTimbang.php');
	// }		
}
else{
		//echo "<center>LOGIN GAGAL! <br>
		//		Username atau Password anda tidak benar.<br>";
		//echo "<a href=Index.html><b>ULANGI LAGI</b></a></center>";
	header('Location: login.php');
	exit();	
}
?>