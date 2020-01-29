<!DOCTYPE html>
<html>
<head>
  <style>

  body {
    background-image: url('Images/Display antrian ruang timbang Poli 4- on.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }

  h1 {
    font-size: 350px;
    font-family: "Arial Bold", Arial, Sans-serif;
  }

  blink {
    color:#33cc00;
    -webkit-animation: blink 1s step-end infinite;
    animation: blink 1s step-end infinite;
  }

  @-webkit-keyframes blink {
    67% { opacity: 0 }
  }

  @keyframes blink {
    67% { opacity: 0 }
  }

  #tabelutama {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    table-layout: fixed;
    word-wrap: break-word;
    white-space: nowrap;
  }

</style>
</head>
<body onload='updatedata();'>
  <table id=tabelutama>
    <tr height=15>
      <td width=20></td>
      <td width=1847></td>
    </tr>
    <tr height=882>
      <td></td>
      <td align=center bgcolor="#000000"></td>
    </tr>
  </table>

  <?php include "koneksi.php"; ?>

  <?php
  $terminal = $_SERVER['REMOTE_ADDR'];

  $query = "SELECT RuangTimbang FROM QP7TEMPLAST WHERE terminal='".$terminal."'";
  $params = array();
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $sql = sqlsrv_query( $conn, $query , $params, $options );
  if ($sql){
    while($rs = sqlsrv_fetch_array($sql)){
      $nomor = $rs['RuangTimbang'];
    }
  }

  $sql = "UPDATE QP7TEMPLAST SET Status='1' WHERE terminal='".$terminal."';";
  $sql_execute = sqlsrv_query($conn,$sql);
  ?>

  <script>
    function updatedata() {
      var nomor = '<?php echo $nomor; ?>';
      var tabel = document.getElementById('tabelutama');

      tabel.rows[1].cells[1].innerHTML = "<h1><blink>" + nomor + "</blink></h1>";

      setTimeout(
        function() {
          window.location.href="antriantimbang4.php";
        }, 15000);
    }
  </script>
</body>
</html>