<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];
$poli = $_POST['poli'];
$terminal = $_SERVER['REMOTE_ADDR'];

date_default_timezone_set('Asia/Jakarta');
$tgl = DATE('Y M d');

$password = strtoupper($password);
$pwd = 0;
for($i=0;$i<strlen($password);$i++){
	$pwd=$pwd+(ord($password{$i})*(strlen($password)-$i));
}

if (empty($username) || empty($password) || empty($poli)){
	echo $username;
	echo $password;
	header('Location: login.php');
	exit();
}else{
	$que = "SELECT count (*) as hasil FROM QP7USER WHERE User_Id = '".$username."' AND Password = '".$pwd."'";
	$sql = sqlsrv_query($conn,$que);
	$count = sqlsrv_fetch_array($sql);
	$hasil = $count["hasil"];
	$user = strip_tags($_POST['username']);
	if($hasil > 0) {
		$_SESSION["username"]= $username;
		$_SESSION["poli"]= $poli;
		$query = "SELECT * FROM QP7TEMPLAST WHERE Nama_Poli='".$poli."'";
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$sql = sqlsrv_query( $conn, $query , $params, $options );
		$row_count = sqlsrv_num_rows( $sql );
		if ($row_count == 0) {
			$sql = "INSERT INTO QP7TEMPLAST(RuangTimbang, Status, Nama_Poli, terminal) VALUES('','1','".$poli."','".$terminal."')";
			$sql_execute = sqlsrv_query($conn,$sql);
			echo $sql;
			// echo "<script>alert('Created');</script>";
			header('location:ruangtimbang.php');
		} else {
			$sql = "UPDATE QP7TEMPLAST SET terminal = '".$terminal."' WHERE Nama_Poli='".$poli."'";
			$sql_execute = sqlsrv_query($conn,$sql);
			echo $sql;
			// echo "<script>alert('Updated');</script>";
			header('location:ruangtimbang.php');
		}
	}
	else{
		header('Location: login.php');
		exit();	
	}
}
?>