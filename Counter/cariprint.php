<?php
include "koneksi.php";
if(isset($_GET['poli']))
{
	$poli = $_GET['poli'];
}

echo "<select name='printer'>
<option></option>";

$que = "select nama_poli from qp7ruang group by Nama_Poli";
$sql = sqlsrv_query($conn,$que);

while($hasil = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
	$npol = $hasil['nama_poli'];
	$npol2 = substr($npol, 11);
	if($npol2 == $poli){
	  	echo "<option value='".$hasil['nama_poli']."' selected>$hasil[nama_poli]</option>";
	  }else{
		echo "<option value='".$hasil['nama_poli']."'>$hasil[nama_poli]</option>";
	}
}
echo "</select>";
?>