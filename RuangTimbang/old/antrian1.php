<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="2" >
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <style>
  body{
    background: url('Display antrian POLI 7 - 1on.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    font-size: 54;
  }

  h1 {
    font-size: 130px;
    font-family: "Arial Bold", Arial, Sans-serif;
  }

  h2 {
    font-size: 30px;
    font-family: "Arial Bold", Arial, Sans-serif;
  }
</style>

<?php 
include "koneksi.php";
?>

</head>


<body onload="updatedata()">
 <table id="myTable">
  <tr height=35>
    <td width=45></td>
    <td width=145></td>
    <td width=23></td>
    <td width=145></td>
    <td width=26></td>
    <td width=145></td>
    <td width=24></td>
    <td width=145></td>
    <td width=20></td>
    <td width=145></td>
  </tr>
  <tr height=102>
    <td></td>
    <td align=center colspan=5 rowspan=5></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
  </tr>
  <tr height=22>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr height=100>
    <td></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
  </tr>
  <tr height=15>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr height=102>
    <td></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
  </tr>
  <tr height=17>
    <td></td>
    <td colspan=5></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr height=100>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
  </tr>
  <tr height=17>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr height=98>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
    <td></td>
    <td align=center></td>
  </tr>
</table>

<?php
$datesave = date('Y/m/d');
$query = "SELECT nomor_antrian FROM qp7antrian WHERE kode='A1' AND status='3' AND tgl_antrian='".$datesave."' ORDER BY id ASC";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$sql = sqlsrv_query( $conn, $query , $params, $options );
$row_count = sqlsrv_num_rows( $sql );
if ($sql){
echo "
<table id=\"tabelAntrian\" border=\"1\" hidden>
  <tr>
    <td>Nomor Antrian</td>
  </tr>";
  while($rs = sqlsrv_fetch_array($sql)){
  echo "
  <tr>
    <td>".$rs['nomor_antrian']."</td>
  </tr>
  ";
}
echo"</table>";
}
?>

<script>
  function updatedata() {
    var tabel = document.getElementById("tabelAntrian");
    var myTable = document.getElementById("myTable");
    var rowCount = tabel.rows.length;
    var r = rowCount - 1;
    for (i = 0; i < r; i++) {
      if (i==0) {
        var a0 = tabel.rows[1].cells[0].innerHTML;
        myTable.rows[1].cells[1].innerHTML = "<h1>" + a0 + "</h1>";
      }

      if (i==1) {
        var a1 = tabel.rows[2].cells[0].innerHTML;
        myTable.rows[1].cells[3].innerHTML = "<h2>" + a1 + "</h2>";
      }

      if (i==2) {
        var a2 = tabel.rows[3].cells[0].innerHTML;
        myTable.rows[1].cells[5].innerHTML = "<h2>" + a2 + "</h2>";
      }

      if (i==3) {
        var a3 = tabel.rows[4].cells[0].innerHTML;  
        myTable.rows[3].cells[2].innerHTML = "<h2>" + a3 + "</h2>";
      }

      if (i==4) {
        var a4 = tabel.rows[5].cells[0].innerHTML;
        myTable.rows[3].cells[4].innerHTML = "<h2>" + a4 + "</h2>";
      }

      if (i==5) {
        var a5 = tabel.rows[6].cells[0].innerHTML;
        myTable.rows[5].cells[2].innerHTML = "<h2>" + a5 + "</h2>";
      }

      if (i==6) {
        var a6 = tabel.rows[7].cells[0].innerHTML;
        myTable.rows[5].cells[4].innerHTML = "<h2>" + a6 + "</h2>";
      }

      if (i==7) {
        var a7 = tabel.rows[8].cells[0].innerHTML;
        myTable.rows[7].cells[1].innerHTML = "<h2>" + a7 + "</h2>";
      }

      if (i==8) {
        var a8 = tabel.rows[9].cells[0].innerHTML;
        myTable.rows[7].cells[3].innerHTML = "<h2>" + a8 + "</h2>";
      }

      if (i==9) {
        var a9 = tabel.rows[10].cells[0].innerHTML;
        myTable.rows[7].cells[5].innerHTML = "<h2>" + a9 + "</h2>";
      }

      if (i==10) {
        var a10 = tabel.rows[11].cells[0].innerHTML;
        myTable.rows[7].cells[7].innerHTML = "<h2>" + a10 + "</h2>";
      }

      if (i==11) {
        var a11 = tabel.rows[12].cells[0].innerHTML;
        myTable.rows[7].cells[9].innerHTML = "<h2>" + a11 + "</h2>";
      }

      if (i==12) {
        var a12 = tabel.rows[13].cells[0].innerHTML;
        myTable.rows[9].cells[1].innerHTML = "<h2>" + a12 + "</h2>";
      }

      if (i==13) {
        var a13 = tabel.rows[14].cells[0].innerHTML;
        myTable.rows[9].cells[3].innerHTML = "<h2>" + a13 + "</h2>";
      }

      if (i==14) {
        var a14 = tabel.rows[15].cells[0].innerHTML;
        myTable.rows[9].cells[5].innerHTML = "<h2>" + a14 + "</h2>";
      }

      if (i==15) {
       var a15 = tabel.rows[16].cells[0].innerHTML;
       myTable.rows[9].cells[7].innerHTML = "<h2>" + a15 + "</h2>";
      }
      
      if (i==16) {
        var a16 = tabel.rows[17].cells[0].innerHTML;
        myTable.rows[9].cells[9].innerHTML = "<h2>" + a16 + "</h2>";
      }

}
}
</script>

</body>
</html>