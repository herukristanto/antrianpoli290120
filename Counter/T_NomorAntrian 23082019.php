<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<p align="center"><img src="Images/header.png" width="1000" height="140"></p>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="refresh" content="30" >
	<title>Counter Pendaftaran</title>
	<script src="script/jquery-1.12.4.js"></script>
	<script src="script/jquery-ui.js"></script>
	<style type="text/css">
	/* Penomoran otomatis pada baris */
	.css-serial {
		counter-reset: serial-number;  /* Atur penomoran ke 0 */
	}
	.css-serial td:first-child:before {
		counter-increment: serial-number;  /* Kenaikan penomoran */
		content: counter(serial-number);  /* Tampilan counter */
	}
	.tengah{
		position: absolute;
		margin-top: -100px;
		margin-left: -200px;
		left: 40%;
		top: 230px;
		width: 700px;
		height: 220px;
	}
	.tengah2{
		position: absolute;
		margin-top: -100px;
		margin-left: -200px;
		left: 40%;
		top: 420px;
		width: 800px;
		height: 220px;
	}
	.tombol{
		height: 50px; 
		width: 100px; 
		color: white;
		background-color: green;
		border-radius: 8px;
	}
	.tombol2{
		color: white;
		background-color: blue;
	}
	.tombol3{
		color: white;
		background-color: red;
	}
	.tombol4{
		color: white;
		background-color: orange;
	}
</style>
</head>

<body>
	<?php
	session_start();
	if (isset($_SESSION["printer"])){
		$printer = $_SESSION["printer"];
		// rubah yudi
		// add poli BC dan SC
		if ($printer == "BREAST CENTER"){
			$printer = 'BC';
		}elseif ($printer == "SKIN CENTER") {
			$printer = 'SC';
		}else{
			$printer = substr($printer, 11);	
		}
	}

	if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<center><H3>Mohon Login Terlebih Dahulu</h3><br>";
		echo "<a href=login.php><b>LOGIN</b></a></center>";
		exit;
	}
	$poli = $_SESSION["poli"];

	function koneksi(){
		include "koneksi.php";
	}

	function caridokter(){
		include "koneksi.php";

		$Datecurrent = date('Y/m/d');
		$poli = $_SESSION["poli"];

	//listdropdown
		$que2 = "SELECT * FROM QP7DOCTOR where Status = '1' order by name";
		$sql2 = sqlsrv_query($conn,$que2);

		echo "<select name='listdokter'>";
		echo "<option></option>";
		while($hasil = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC)){
			echo "<option value=$hasil[Doctor_Id]>$hasil[Name]</option>";			
		}
	}
	function ruang(){
		include "koneksi.php";

		$poli = $_SESSION["poli"];
		
	//list ruang
		$que3 = "select * from QP7RUANG where nama_poli ='".$poli."'"; 
		$sql3 = sqlsrv_query($conn,$que3);

		echo "<select name='listruang'>";
		echo "<option></option>";
		while($app3 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC)){
			echo "<option value=$app3[Id_Ruang]>$app3[Nama_Ruang]</option>";	
		}
	}
	?>
	<div class=tengah>
		<table id="MyTable2" width='710px' border=0>
			<tr>
				<th colspan="2" align="center"><h1><?php echo $poli; ?></h1></th>
			</tr>
			<tr>
				<td>
					Update Kedatangan
					<br>
					<input type='text' id='nomordatang'></input> <button onclick="Datang();">Datang</button></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td><button type=button onclick="savelistdokter();">Save</button></td>
					<td align="right"><button type=button onclick="logout();">Logout</button></td>
				</tr>
			</table>
		</div>

		<?php
		date_default_timezone_set("Asia/Bangkok");
		include "koneksi.php";
		$datesave = date('Y/m/d');

		$query2 = "select count (id) as id from V_QP7LISTDOCTOR where Nama_Poli='".$poli."' and selesai_praktek = '00:00:00' and create_date='".$datesave."'";
		$sql5 = sqlsrv_query($conn2, $query2);
		$isi = sqlsrv_fetch_array($sql5, SQLSRV_FETCH_ASSOC);
		$isi2 = $isi['id'];

		$query = "select * from V_QP7LISTDOCTOR where Nama_Poli='".$poli."' and selesai_praktek = '00:00:00' and create_date='".$datesave."'order by id";
		$sql4 = sqlsrv_query($conn, $query);

		echo "
		<div class=tengah2>
		<table id=\"MyTable\" width=\"700px\" border=1>
		<tr>
		<th align=center width=\"150px\">Dokter</th>
		<th align=center>Ruang</th>
		<th colspan='4' align=center>Tombol</th>
		<th align=center>Nomor Terakhir</th>
		</tr>";
		if ($isi2 > 0){
			while($rs=sqlsrv_fetch_array($sql4, SQLSRV_FETCH_ASSOC)){
				echo"
				<tr>
				<td width=10px>";
				$poli = $_SESSION["poli"];

				$que2 = "SELECT * FROM QP7DOCTOR where Status = '1' order by name";
				$sql2 = sqlsrv_query($conn2,$que2);

				if($rs['Doctor_Id']!=""){
					echo "<select name='listdokter' disabled>";
				}else{
					echo "<select name='listdokter'>";
				}

				echo "<option></option>";
				while($hasil = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC)){
					if ($rs['Doctor_Id'] == $hasil['Doctor_Id']){
						echo "<option value='".$hasil['Doctor_Id']."' selected>".$hasil['Name']."</option>";
					}else{
						echo "<option value='".$hasil['Doctor_Id']."'>".$hasil['Name']."</option>";
					}
				}
				echo "</select>
				</td>
				<td>";
				$poli = $_SESSION["poli"];

					//list ruang
				$que3 = "select * from QP7RUANG where nama_poli ='".$poli."'"; 
				$sql3 = sqlsrv_query($conn,$que3);

				if ($rs['Id_Ruang']!="") {
					echo "<select name='listruang' disabled>";
				}else{

					echo "<select name='listruang'>";
				}

				echo "<option></option>";
				while($app3 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC)){
					if ($rs['Id_Ruang'] == $app3['Id_Ruang']){
						echo "<option value=$app3[Id_Ruang] selected>$app3[Nama_Ruang]</option>";
					}else{
						echo "<option value=$app3[Id_Ruang]>$app3[Nama_Ruang]</option>";
					}	
				}
				echo "</select>

				</td>
				<td>";
				$rs2 = $rs['flagstart'];
				if ($rs2 != 'X'){
					echo "<button type=button onclick=\"StartRuang(this);\" class=\"tombol4\">Start</button>";
				}else{
					echo "<button type=button onclick=\"StartRuang(this);\" disabled>Start</button>";
				}
				echo "</td>
				<td><button type=button onclick=\"Daftar(this);\" class=\"tombol2\">Daftar</button></td>
				<td><button type=button onclick=\"NomorAntri(this);\" class=\"tombol\">Nomor Antrian</button></td>
				<td><button type=button onclick=\"StopRuang(this);\" class=\"tombol3\">Selesai</button></td>
				<td hidden>".$rs['id']."</td>
				<td hidden>".$rs['kode']."</td>";
				$que5 = "SELECT * FROM QP7TEMPLAST2 where Id_Ruang = '".$rs['Id_Ruang']."' and kode = '".$rs['kode']."'and tanggal = '".$datesave."'";
				$sql5 = sqlsrv_query($conn3,$que5);
				$isi5 = sqlsrv_fetch_array($sql5, SQLSRV_FETCH_ASSOC);
				echo "<td align=center>".$isi5['nomor']."</td>
				</tr>";
			}
			echo "</table>";
		}else{
			echo "
			<tr>
			<td>";
			$poli = $_SESSION["poli"];
			$que2 = "SELECT * FROM QP7DOCTOR where Status = '1' order by name";
			$sql2 = sqlsrv_query($conn2,$que2);
			echo "<select name='listdokter'>";
			echo "<option></option>";
			while($hasil = sqlsrv_fetch_array($sql2, SQLSRV_FETCH_ASSOC)){
				echo "<option value='".$hasil[Doctor_Id]."'>".$hasil[Name]."</option>";
			}
			echo "</select>
			</td>
			<td>";
			$poli = $_SESSION["poli"];
			$que3 = "select * from QP7RUANG where nama_poli ='".$poli."'"; 
			$sql3 = sqlsrv_query($conn,$que3);
			echo "<select name='listruang'>";
			echo "<option></option>";
			while($app3 = sqlsrv_fetch_array($sql3, SQLSRV_FETCH_ASSOC)){
				echo "<option value=$app3[Id_Ruang]>$app3[Nama_Ruang]</option>";
			}
			echo "</select>
			</td>
			<td><button type=button onclick=\"StartRuang(this);\" class=\"tombol4\">Start</button></td>
			<td><button type=button onclick=\"Daftar(this);\" class=\"tombol2\">Daftar</button></td>
			<td><button type=button onclick=\"NomorAntri(this);\" class=\"tombol\">Nomor Antrian</button></td>
			<td><button type=button onclick=\"StopRuang(this);\" class=\"tombol3\">Selesai</button></td>
			<td hidden></td>
			<td hidden></td>
			<td></td>
			</tr>
			</table>
			";
		}

		?>
		<br>
		<button type=button onclick="addtabel();">Add</button>

	</div>

	<script>
		function addtabel() {
			var table = document.getElementById("MyTable");
			var oRows = document.getElementById('MyTable').getElementsByTagName('tr');
			var iRowCount = oRows.length;
			var row = table.insertRow(iRowCount);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			var cell6 = row.insertCell(5);
			var cell7 = row.insertCell(6);
			var cell8 = row.insertCell(7);

			cell1.innerHTML = "<?php caridokter();?>";
			cell2.innerHTML = "<?php ruang();?>";
			cell3.innerHTML = "<button type=button class=\"tombol4\">Start</button>";
			cell3.setAttribute('onclick', 'StartRuang(this)');
			cell4.innerHTML = "<button type=button class=\"tombol2\">Daftar</button>";
			cell4.setAttribute('onclick', 'Daftar(this)');
			cell5.innerHTML = "<button type=button onclick='NomorAntri(this);' class='tombol'>Nomor Antrian</button>";
			cell6.innerHTML = "<button type=button class=\"tombol3\">Selesai</button>";
			cell6.setAttribute('onclick', 'StopRuang(this)');
			cell7.innerHTML = "";
			cell7.setAttribute('hidden','true');
			cell8.innerHTML = "";
			cell8.setAttribute('hidden','true');
			cell9.innerHTML = "";
		}

		function NomorAntri(r){
			var table = document.getElementById("MyTable");
			var rowIndex = r.parentNode.parentNode.rowIndex;
			var idrow = table.rows[rowIndex].cells[6].innerHTML;
			var printer = '<?php echo $printer ?>';
			window.location.href = 'nomorantrian.php?idrow='+idrow+'&printer='+printer;
		}

		function StartRuang(x){
			var table = document.getElementById("MyTable");
			var rowIndex = x.parentNode.parentNode.rowIndex;
			var idrow = table.rows[rowIndex].cells[6].innerHTML;

			window.location.href='startruang.php?idrow=' + idrow;
		}

		function StopRuang(x){
			var table = document.getElementById("MyTable");
			var rowIndex = x.parentNode.parentNode.rowIndex;
			var idrow = table.rows[rowIndex].cells[6].innerHTML;
			if(confirm("Apakah anda yakin akan tutup ruang ini")){
				window.location.href='stopruang.php?idrow=' + idrow;
			}else{

			}

		}

		function savelistdokter(){
			var table = document.getElementById("MyTable");
			var rowCount = table.rows.length;
			var m = rowCount - 1;
			var k;
			var pol = document.getElementsByName('listdokter')[0].value;
			var r = document.getElementsByName('listdokter').length;
			var dokter;
			var ruang;
			var idlist;
			var arr1 = [];
			var arr2 = [];

			for (i = 0; i < r; i++) {
				j = i ;
				k = i + 1;
				arr2 = [];

				dokter = document.getElementsByName('listdokter')[i].value;
				if (dokter == ''){
					alert("Lengkapi data terlebih dahulu");
					dokter = 'x';
					break;
				}
				ruang = document.getElementsByName('listruang')[i].value;
				if (ruang == ''){
					alert("Lengkapi data terlebih dahulu");
					ruang='x';
					break;
				}
				idlist = table.rows[k].cells[6].innerHTML;

				arr2[0] = dokter;
				arr2[1] = ruang;
				arr2[2] = idlist;

				arr1[j] = arr2;

			}
			if (dokter !== 'x' && ruang !== 'x'){
				$.post("savelistdoctor.php", {'myData': arr1}, function(data, status){
					if (data=='gagal'){
						alert("Data Gagal Disimpan");
					}else{
						alert("Data Berhasil Disimpan");
						window.location.href='T_NomorAntrian.php';}
					});
			}
		}

		function Daftar(d){
			var table = document.getElementById("MyTable");
			var rowIndex = d.parentNode.parentNode.rowIndex;
			var idrow = table.rows[rowIndex].cells[6].innerHTML;
			var printer = '<?php echo $printer ?>';	
			window.location.href = 'daftar.php?idrow='+idrow+'&printer='+printer;
		}

		function Datang(){
			var ndt = document.getElementById("nomordatang").value;
			if (ndt == ''){
				alert("Masukkan nomor antrian terlebih dahulu");
			}else{
				window.location.href = 'datang.php?nomor='+ndt;
			}
		}

		function logout(){
			window.location.href='logout.php';
		}

		
	</script>
</body>
