<?php
include "koneksi.php"; 

$id = $_POST['id'];
$nama = $_POST['nama'];
$status = $_POST['pilihstatus'];

#get date time current
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d H:i:s');
$tgl = date('Y-m-d');
$waktu = substr($date,11,8);

//echo $id;
//echo "<br>";
//echo $nama;
//echo "<br>";
//echo $status;
//echo "<br>";
//echo $date;

//$sql = "INSERT INTO QP7DOCTOR (Doctor_Id,Name,Status,Create_By,Create_Time) VALUES ('".$id."','".$nama."','".$status."','Admin','".$date."')";

//$sql_insert = sqlsrv_query($conn,$sql);

if (!empty($id)&&!empty($nama)&&!empty($status)){

	$update = sqlsrv_query($conn,"UPDATE QP7DOCTOR SET Doctor_Id = '".$id."', Name = '".$nama."',
	Status = '".$status."' WHERE Doctor_Id = '".$id."'");		
		echo '<script>
	 			alert("Data Dokter berhasil diupdate");
				window.location="MasterDokter.php";</script>';
	}
	else{echo '<script>
						alert("Gagal mengupdate Data Dokter, tolong lengkapi data");
						window.location="MasterDokter.php";</script>';}



//header( "Location: MasterDokter.php" );  
	

?>
