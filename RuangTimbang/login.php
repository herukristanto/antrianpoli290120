<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<p align="center"><img src="Images/header.png" width="1000" height="140"></p>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Ruang Timbang</title>
<style type="text/css">
#Footer {
	font-size: 10px;
	color: #000;
	background-color: #FFF;
}
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 18px;
}
.tengah{
	position: absolute;
	margin-top: -100px;
	margin-left: -200px;
	left: 50%;
	top: 50%;
	width: 400px;
	height: 220px;
}
</style>
</head>
<title>Login</title>
<body>
<!-- <div id="Container"> -->
<!--   <div id="Header"> -->
<div class="tengah">
  	<form method=POST action=CekLogin.php>
    <table align='center'>
      <tr>
        <td>LOGIN</td>
        <td></td>
      </tr>
	  <tr>
        <td>Poliklinik</td>
        <td> :
		<select name="poli">
			<option></option>
			<?php
				include "koneksi.php";

				$que = "select nama_poli from qp7ruang group by Nama_Poli";
				$sql = sqlsrv_query($conn2,$que);

					while($hasil = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
						echo "<option value='".$hasil[nama_poli]."'>$hasil[nama_poli]</option>";
					}
			?>
		</select>
		</td>
      </tr>     
	  <tr>
        <td>Username</td>
        <td> :
          <input type=text name=username /></td>
      </tr>
      <tr>
        <td>Password</td>
        <td> :
          <input type=password name=password /></td>
      </tr>

      <tr>
        <td colspan=2 align="Right"><input type=submit value=Login /></td>
      </tr>
    </table>
    </form>
	<div id="Footer">
		<br>
		<br>
		<p align="center">..:: Technology Information 2017 ::..</p>
	</div>
</div>
</body>
</html>
