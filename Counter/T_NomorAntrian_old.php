<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.tengah{
	position: absolute;
	margin-left: -300px;
	left: 50%;
	top: 2%;
	width: 400px;
	height: 220px;
}
tr{
	height:100px;
	vertical-align:top;
}
.tombol{
	height: 50px; 
	width: 100px; 
}
</style>
</head>

<body>
<?php
//cek data base
	session_start();
	//cek session
	if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<center><H3>Mohon Login Terlebih Dahulu</h3><br>";
		echo "<a href=login.php><b>LOGIN</b></a></center>";
		exit;
	}
	
	function caridokter($kode)
	{
 		include "koneksi.php";
		
		$Datecurrent = date('Y/m/d');
		$poli = $_SESSION["poli"];
		
		//cek dokter yg dipilih
		$que = "select * from V_QP7LISTDOCTOR where create_date = '".$Datecurrent."' and poliklinik = '".$poli."' and  kode = '".$kode."' ORDER BY ID DESC";
		$sql = sqlsrv_query($conn,$que);
		$app = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
		$kodedokter = $app['dokter'];
		
		//listdropdown
		$que2 = "SELECT * FROM QP7DOCTOR where Active is null";
		$sql2 = sqlsrv_query($conn2,$que2);
		
		//nama dropdown
		$drop = 'MDoctor'.$kode;
		if ($kodedokter <> "")
		{
			echo "<select id= $drop name=$drop disabled>";
		}else{
			echo "<select id= $drop name=$drop>";
		}
		echo "<option></option>";
			while($hasil = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC)){
				if ($kodedokter == $hasil['Doctor_Id']){
					echo "<option value=$hasil[Doctor_Id] selected>$hasil[Name]</option>";
				}else{
					echo "<option value=$hasil[Doctor_Id]>$hasil[Name]</option>";
				}
			}
	}
	/*include "koneksi.php";	
	$Datecurrent = date('Y/m/d');
	$poli = $_SESSION["poli"];		
	$que = "select * from V_QP7LISTDOCTOR where create_date = '".$Datecurrent."' and poliklinik = '".$poli."' and  kode = '".$kode."' ORDER BY ID DESC";
	$sql = sqlsrv_query($conn,$que);
	$app = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
	echo $app['Name'];*/
?>
<div class="tengah">


<form method=POST action=savelistdoctor.php>
<input type=submit value=Save></input><button type=button onclick="bukalist();">Ganti Dokter</button>
<br>
<br>
<br>
<table width="500" border="1">
  <tr>
    <td rowspan="3" width="60px">Ruang 1</td>
    <td width="150px">
		<?php
			caridokter('A1');
		?>
	</td>
    <td width="200px"><button type=button onclick="NomorAntrian('A1');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('A2');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('A2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('A3');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('A3');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 2</td>
    <td>
		<?php
			caridokter('B1');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('B1');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('B2');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('B2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('B3');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('B3');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 3</td>
    <td>
		<?php
			caridokter('C1');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('C1');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('C2');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('C2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('C3');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('C2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 4</td>
    <td>
		<?php
			caridokter('D1');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('D1');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('D2');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('D2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('D3');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('D3');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 5</td>
    <td>
		<?php
			caridokter('E1');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('E1');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('E2');
		?>
	</td>
    <td ><button type=button onclick="NomorAntrian('E2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('E3');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('E3');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 6</td>
    <td>
		<?php
			caridokter('F1');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('F1');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('F2');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('F2');" class="tombol">Nomor Antrian</button></td>
  </tr>
  <tr>
    <td>
		<?php
			caridokter('F3');
		?>
	</td>
    <td><button type=button onclick="NomorAntrian('F3');" class="tombol">Nomor Antrian</button></td>
  </tr>
</form>
</table>
</div>
<script>
	function bukalist()
	{
		document.getElementById("MDoctorA1").removeAttribute('disabled');
		document.getElementById("MDoctorA2").removeAttribute('disabled');
		document.getElementById("MDoctorA3").removeAttribute('disabled');
		
		document.getElementById("MDoctorB1").removeAttribute('disabled');
		document.getElementById("MDoctorB2").removeAttribute('disabled');
		document.getElementById("MDoctorB3").removeAttribute('disabled');
		
		document.getElementById("MDoctorC1").removeAttribute('disabled');
		document.getElementById("MDoctorC2").removeAttribute('disabled');
		document.getElementById("MDoctorC3").removeAttribute('disabled');
		
		document.getElementById("MDoctorD1").removeAttribute('disabled');
		document.getElementById("MDoctorD2").removeAttribute('disabled');
		document.getElementById("MDoctorD3").removeAttribute('disabled');
		
		document.getElementById("MDoctorE1").removeAttribute('disabled');
		document.getElementById("MDoctorE2").removeAttribute('disabled');
		document.getElementById("MDoctorE3").removeAttribute('disabled');
		
		document.getElementById("MDoctorF1").removeAttribute('disabled');
		document.getElementById("MDoctorF2").removeAttribute('disabled');
		document.getElementById("MDoctorF3").removeAttribute('disabled');
	}
	
	function NomorAntrian(r)
	{
		window.location.href = 'nomorantrian.php?ruang='+r;
	}
</script>
</body>
</html>