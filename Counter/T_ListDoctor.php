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
	height:30px;
	vertical-align:top;
}
.tombol{
	height: 50px; 
	width: 100px; 
}
</style>
</head>

<body>
<div class="tengah">
<?php
	session_start();
	function caridokter($kode)
	{
 		include "koneksi.php";
		
		$Datecurrent = date('Y/m/d');
		$poli = $_SESSION["poli"];
		
		$que = "select * from V_QP7LISTDOCTOR where create_date = '".$Datecurrent."' and poliklinik = '".$poli."' and  kode = '".$kode."' ORDER BY ID DESC";
		$sql = sqlsrv_query($conn,$que);
		$app = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
		$kodedokter = $app['dokter'];
		
		$que2 = "SELECT * FROM QP7DOCTOR where Active is null";
		$sql2 = sqlsrv_query($conn2,$que2);

			while($hasil = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC)){
				if ($kodedokter == $hasil['Doctor_Id']){
					echo "<option value=$hasil[Doctor_Id] selected>$hasil[Name]</option>";
				}else{
					echo "<option value=$hasil[Doctor_Id]>$hasil[Name]</option>";
				}
			}
	}
?>
<form method=POST action=savelistdoctor.php>
<input type=submit value=Save />
<button onclick="Nomor();">Ganti Dokter</button>
<br>
<br>
<br>
<table width="500" border="0">
  <tr>
    <td rowspan="3" width="60px">Ruang 1</td>
    <td width="150px">
	<select name="MDoctorA1">
		<option></option>
		<?php
			caridokter('A1');
		?>
	</select>
	</td>
    <td width="200px"></td>
  </tr>
  <tr>
    <td>
	<select name="MDoctorA2">
		<option></option>
		<?php
			caridokter('A2');
		?>
	</select>
	</td>
  </tr>
  <tr>
    <td>
	<select name="MDoctorA3">
		<option></option>
		<?php
			caridokter('A3');
		?>
	</select>
	</td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 2</td>
    <td>
	<select name="MDoctorB1">
		<option></option>
		<?php
			caridokter('B1');
		?>
	</select>
	</td>
  </tr>
  <tr>
    <td>
	<select name="MDoctorB2">
		<option></option>
		<?php
			caridokter('B2');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td>
	<select name="MDoctorB3">
		<option></option>
		<?php
			caridokter('B3');
		?>
	</select>
	</td>
    <td ></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 3</td>
    <td>
	<select name="MDoctorC1">
		<option></option>
		<?php
			caridokter('C1');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td>
	<select name="MDoctorC2">
		<option></option>
		<?php
			caridokter('C2');
		?>
	</select>
	</td>
    <td ></td>
  </tr>
  <tr>
    <td>
	<select name="MDoctorC3">
		<option></option>
		<?php
			caridokter('C3');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 4</td>
    <td>
	<select name="MDoctorD1">
		<option></option>
		<?php
			caridokter('D1');
		?>
	</select>
	</td>
    <td ></td>
  </tr>
  <tr>
    <td>
	<select name="MDoctorD2">
		<option></option>
		<?php
			caridokter('D2');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td>
	<select name="MDoctorD3">
		<option></option>
		<?php
			caridokter('D3');
		?>
	</select>
	</td>
    <td ></td>
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 5</td>
    <td>
	<select name="MDoctorE1">
		<option></option>
		<?php
			caridokter('E1');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td>
	<select name="MDoctorE2">
		<option></option>
		<?php
			caridokter('E2');
		?>
	</select>
	</td>
    <td ></td>
  </tr>
  <tr>
    <td>
	<select name="MDoctorE3">
		<option></option>
		<?php
			caridokter('E3');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td rowspan="3" valign="top">Ruang 6</td>
    <td>
	<select name="MDoctorF1">
		<option></option>
		<?php
			caridokter('F1');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td>
	<select name="MDoctorF2">
		<option></option>
		<?php
			caridokter('F2');
		?>
	</select>
	</td>
    
  </tr>
  <tr>
    <td>
	<select name="MDoctorF3">
		<option></option>
		<?php
			caridokter('F3');
		?>
	</select>
	</td>
    
  </tr>
</table>
</form>
</div>
<script>
	function Nomor()
	{
		window.location.href = 'new1.php';
	}
</script>
</body>
</html>