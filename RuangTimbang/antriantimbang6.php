<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="2" >
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>ANTRIAN TIMBANG</title>
  
  <style>

  body {
    background-image: url('Images/Display antrian ruang timbang BC - on.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }

  h3 {
    font-size: 45px;
    font-family: "Arial Bold", Arial, Sans-serif;
  }

  #tabelutama {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    table-layout: fixed;
    word-wrap: break-word;
    white-space: nowrap;
  }

</style>

<?php 
include "koneksi.php";

$terminal = $_SERVER['REMOTE_ADDR'];
date_default_timezone_set('Asia/Jakarta');
$date = DATE('d M Y H:i:s');
$hari = DATE('D');
$tanggal = DATE('d');
$bulan = DATE('F');
$tahun = DATE('Y');
$waktu = DATE('H:i:s');
$datenow = date('Y/m/d');

$query = "SELECT * FROM QP7TEMPLAST WHERE terminal='".$terminal."'";
$params = array();
$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$sql = sqlsrv_query( $conn, $query , $params, $options );
$rs = sqlsrv_fetch_array($sql);

$poli = $rs['Nama_Poli'];
$status = $rs['Status'];

if ($poli=="BREAST CENTER") {

  $query = "SELECT nomor_antrian FROM V_QP7ANTRIAN WHERE tgl_antrian='".$datenow."' AND status <> 0 AND kode like '1%' AND jam_pasien_timbang_selesai is null AND Nama_Poli LIKE '%".$poli."' order by kode, id";
  $params = array();
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $sql = sqlsrv_query( $conn, $query , $params, $options );
  if ($sql) {
    echo "
    <table id=\"tabelAntrian1\" border=\"1\" hidden>
    <tr>
    <td>Nomor Antrian</td>
    </tr>";
    while($rs = sqlsrv_fetch_array($sql)) {
      echo "
      <tr>
      <td>".$rs['nomor_antrian']."</td>
      </tr>
      ";
    }
    echo"</table>";
  }

  $query = "SELECT nomor_antrian FROM V_QP7ANTRIAN WHERE tgl_antrian='".$datenow."' AND status <> 0 AND kode like '2%' AND jam_pasien_timbang_selesai is null AND Nama_Poli LIKE '%".$poli."' order by kode, id";
  $params = array();
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $sql = sqlsrv_query( $conn, $query , $params, $options );
  if ($sql) {
    echo "
    <table id=\"tabelAntrian2\" border=\"1\" hidden>
    <tr>
    <td>Nomor Antrian</td>
    </tr>";
    while($rs = sqlsrv_fetch_array($sql)) {
      echo "
      <tr>
      <td>".$rs['nomor_antrian']."</td>
      </tr>
      ";
    }
    echo"</table>";
  }
}

?>

</head>
<body onload='updatedata();'>
  <table id=tabelutama>
    <tr height=15>
      <td width=25></td>
      <td width=198></td>
      <td width=205></td>
      <td width=201></td>
      <td width=203></td>
      <td width=205></td>
      <td width=205></td>
      <td width=205></td>
      <td width=205></td>
      <td width=203></td>
    </tr>
    <tr height=145>
      <td></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
    </tr>
    <tr height=149>
      <td></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
    </tr>
    <tr height=147>
      <td></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
    </tr>
    <tr height=148>
      <td></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
    </tr>
    <tr height=152>
      <td></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
    </tr>
    <tr height=140>
      <td></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
      <td align=center></td>
    </tr>
    <tr height=145>
      <td align=center colspan=9></td>
      <td align=right colspan=3 style="font-size:27px"><h4><?php echo $tanggal ?>&nbsp;<?php echo $bulan ?>&nbsp;<?php echo $tahun ?><br><?php echo $waktu ?></h4></td>
      <td></td>
    </tr>
  </table>

  <script>
    function updatedata() {
      var i;
      var j;

      var tabelutama = document.getElementById('tabelutama');
      var jumlahkamar = 9 + 1;

      var tabel1 = document.getElementById('tabelAntrian1');
      if (tabel1!=null){
        var rowcount1 = tabel1.rows.length;
      }

      var tabel2 = document.getElementById('tabelAntrian2');
      if (tabel2!=null){
        var rowcount2 = tabel2.rows.length;
      }  

      var tabel3 = document.getElementById('tabelAntrian3');
      if (tabel3!=null){
        var rowcount3 = tabel3.rows.length;
      }  

      var tabel4 = document.getElementById('tabelAntrian4');
      if (tabel4!=null){
        var rowcount4 = tabel4.rows.length;
      }

      var tabel5 = document.getElementById('tabelAntrian5');
      if (tabel5!=null){
        var rowcount5 = tabel5.rows.length;
      }

      var tabel6 = document.getElementById('tabelAntrian6');
      if (tabel6!=null){
        var rowcount6 = tabel6.rows.length;
      }

      var tabel7 = document.getElementById('tabelAntrian7');
      if (tabel7!=null){
        var rowcount7 = tabel7.rows.length;
      }

      var tabel8 = document.getElementById('tabelAntrian8');
      if (tabel8!=null){
       var rowcount8 = tabel8.rows.length;
     }

     var tabel9 = document.getElementById('tabelAntrian9');
     if (tabel9!=null){
      var rowcount9 = tabel9.rows.length;
    }

    var tabel10 = document.getElementById('tabelAntrian10');
    if (tabel10!=null){
      var rowcount10 = tabel10.rows.length;
    }

    var tabel11 = document.getElementById('tabelAntrian11');
    if (tabel11!=null){
      var rowcount11 = tabel11.rows.length;
    }


    for (i = 1; i < jumlahkamar; i++) {

      if (tabelutama.rows[1].cells[i].innerHTML=="") {

        if (rowcount1>1) {
          hit = rowcount1;
          if (hit > 7) {
            hit = 7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel1.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount1 = 1;
        } else if (rowcount2>1) {
          hit = rowcount2;
          if (hit > 7) {
            hit = 7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel2.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount2 = 1;
        } else if (rowcount3>1) {
          hit = rowcount3;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel3.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount3 = 1;
        } else if (rowcount4>1) {
          hit = rowcount4;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel4.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount4 = 1;
        } else if (rowcount5>1) {
          hit = rowcount5;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel5.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount5 = 1;
        } else if (rowcount6>1) {
          hit = rowcount6;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel6.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount6 = 1;
        } else if (rowcount7>1) {
          hit = rowcount7;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel7.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount7 = 1;
        } else if (rowcount8>1) {
          hit = rowcount8;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel8.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount8 = 1;
        } else if (rowcount9>1) {
          hit = rowcount9;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel9.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount9 = 1;
        } else if (rowcount10>1 ) {
          hit = rowcount10;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel10.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount10 = 1;
        }else if (rowcount11>1) {
          hit = rowcount11;
          if (hit > 7) {
            hit =7;
          }
          for (j = 1; j < hit; j++) {
            tabelutama.rows[j].cells[i].innerHTML = "<h3>" + tabel11.rows[j].cells[0].innerHTML + "</h3>";
          }
          rowcount11 = 1;
        }
      }

    }

    var status = '<?php echo $status ?>';
    var poli = '<?php echo $poli ?>';

    if (poli=='BREAST CENTER') {
      if (status=='2') {
        window.location.href="antriantimbangcall6.php";
      }
    } else {
      if (poli=='POLIKLINIK 1') {
        window.location.href="antriantimbang1.php";
      } else if (poli=='POLIKLINIK 2') {
        window.location.href="antriantimbang2.php";
      } else if (poli=='POLIKLINIK 3') {
        window.location.href="antriantimbang3.php";
      } else if (poli=='POLIKLINIK 4') {
        window.location.href="antriantimbang4.php";
      } else if (poli=='SKIN CENTER') {
        window.location.href="antriantimbang5.php";
      } else if (poli=='POLIKLINIK 7') {
        window.location.href="antriantimbang.php";
      }
    }
    

  }
</script>
</body>
</html>