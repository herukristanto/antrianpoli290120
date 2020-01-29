<html>
<body onload='playsign(), movepage()'>
	<audio id="audio" src="audio/KamarTimbang.wav" ></audio>
	<h1>Sedang Memanggil</h1>
	<?php
	include "koneksi.php";

	session_start();
	$poli = $_SESSION['poli'];
	$id = $_GET['id'];

	date_default_timezone_set('Asia/Jakarta');
	$date = date('Y-m-d H:i:s');
	$waktu = substr($date,11,8);
	$tgl = date('Y-m-d');

	$terminal = $_SERVER['REMOTE_ADDR'];

	$query = "SELECT * FROM QP7ANTRIAN WHERE id='".$id."'";
	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$sql = sqlsrv_query( $conn, $query , $params, $options );
	$row_count = sqlsrv_num_rows( $sql );
	while($rs = sqlsrv_fetch_array($sql)){
		$nomor_antrian = $rs['nomor_antrian'];
		$cektimbang = $rs['jam_pasien_timbang'];
	}

	if (empty($cektimbang) == true) {
		$query = "UPDATE QP7ANTRIAN SET jam_pasien_timbang = '".$date."',jam_pasien_timbang_berikut = '".$date."', status = '2' WHERE id = '".$id."'";
		$sql = sqlsrv_query($conn, $query);
	} else {
		$query = "UPDATE QP7ANTRIAN SET jam_pasien_timbang_berikut = '".$date."', status = '2' WHERE id = '".$id."'";
		$sql = sqlsrv_query($conn, $query);
	}

	$query = "UPDATE QP7TEMPLAST SET RuangTimbang = '".$nomor_antrian."', Status ='2', id='".$id."' WHERE Nama_Poli='".$poli."'";
	$sql = sqlsrv_query($conn, $query);

	?>

	<Script>
		function playsign(){
			var audio = document.getElementById("audio");
			audio.play();
		}

		function movepage() {
			setTimeout(
				function() {
					parent.window.location.href='ruangtimbang.php';
				},
			15000);
		}
	</script>

</body>
</html>