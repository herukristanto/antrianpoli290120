<!DOCTYPE html>
<html>
<head>
  <style>
  body{
    background: url('Display antrian POLI 7 - 1on.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    font-size: 54;
  }

  h1 {
    font-size: 240px;
    font-family: "Arial Bold", Arial, Sans-serif;
  }

  blink {
   color:red;
   -webkit-animation: blink 1s step-end infinite;
   animation: blink 1s step-end infinite;
 }

 @-webkit-keyframes blink {
   67% { opacity: 0 }
 }

 @keyframes blink {
   67% { opacity: 0 }
 }
</style>

<?php 
include "koneksi.php";
?>

</head>


<body onLoad="updatedata(), movepage()">
 <table id="myTable">
  <tr height=25>
    <td width=30></td>
    <td width=879></td>
  </tr>
  <tr height=610>
    <td></td>
    <td align=center bgcolor="#FFFFFF"></td>
  </tr>
</table>

<?php
$datesave = date('Y/m/d');
$query = "SELECT RuangTimbang FROM qp7templast";
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
    <td>".$rs['RuangTimbang']."</td>
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
        myTable.rows[1].cells[1].innerHTML = "<h1><blink>" + a0 + "</blink></h1>";
      }
    }
  }

  function movepage() {
    setTimeout(
      function() {
        window.location.href='AntrianTimbang.php';
      }, 5000);
  }
</script>

</body>
</html>