<!DOCTYPE HTML>
<html>

<?php
include "koneksi.php";
?>

<head>
	<p align="center"><img src="Images/header.png" width="1000" height="140"></p>
	<script src="script/jquery-1.12.4.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>RUANG TIMBANG</title>
	<style type="text/css">
	.center{
		position: absolute;
		margin-left: -250px;
		left: 50%;
		top: 200px;
		width: 400px;
		height: 220px;
	}

	.button{
		height: 50px; 
		width: 100px; 
	}

	h1 {
		font-size: 50px;
		font-family: "Arial Bold", Arial, Sans-serif;
		margin-top: 0em;
		margin-bottom: 0em;
		margin-left: 0;
		margin-right: 0;
		color: red;
		font-weight: bold;
	}
</style>
<script>
	function keluar(){
		var r = confirm("Apakah Anda Yakin Ingin Keluar?");
		if(r == true){
			window.location.href = "logout.php";
		}
	}

	function cancel(Cn){
		if (Cn != '') {
			var cf=confirm("Anda Yakin Ingin Cancel");
			if (cf) { 
				window.location.href = "proses_after_call.php?cmd=cancel&nomor="+Cn;
			} else {
				//do nothing
			}
		}
	}

	function complete(Cr) {
		if (Cr != '') {
			window.location.href = "proses_after_call.php?cmd=complete&nomor="+Cr;
		}
	}
</script>
</head>
<body>

	<?php
	session_start();
	if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<center><H3>Mohon Login Terlebih Dahulu</h3><br>";
		echo "<a href=login.php><b>LOGIN</b></a></center>";
		exit;
	} else {
		$poli = $_SESSION['poli'];

		$query = "SELECT * FROM QP7TEMPLAST WHERE Nama_Poli='".$poli."'";
		$params = array();
		$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
		$sql = sqlsrv_query( $conn, $query , $params, $options );
		if ($sql){
			while($rs = sqlsrv_fetch_array($sql)){
				$nomor = $rs['RuangTimbang'];
			}
		}
	}
	?>

	<center>
		<table>
			<tr><td align=right width=950px><button onclick="keluar()">Logout</button></td></tr>
			<tr>
				<td align=center>
					<h2>ANTRIAN TIMBANG <?php echo $poli ?></h2>
				</td>
			</tr>
		</table>

		<table border=1 id='sedangpanggil'>
			<tr height=70px>
				<td width=250px align=center>
					<h2>Sedang Timbang</h2>
				</td>
			</tr>
			<tr height=100px>
				<td align=center>
					<h1><?php echo $nomor ?><h1>
					</td>
				</tr>
				<tr height=50px>
					<td align=center>
						<input type="image" src="../RuangTimbang/Images/button_complete.PNG" onclick="complete('<?php echo $nomor ?>')"></input>
						<input type="image" src="../RuangTimbang/Images/button_cancel.PNG" onclick="cancel('<?php echo $nomor ?>')"></input>
					</td>
				</tr>
			</table>
			<br>

			<iframe src="tabelruangtimbang.php?poli=<?php echo $poli ?>" height=400px width=500px></iframe>

		</center>
	</body>
	</html>