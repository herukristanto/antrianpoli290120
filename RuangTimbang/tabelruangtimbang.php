<script src="script/jquery-1.12.4.js"></script>
<meta http-equiv="refresh" content="5" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
    <style>
    .center{
        position: absolute;
        margin-left: -250px;
        left: 50%;
        top: 200px;
        width: 400px;
        height: 220px;
    }

    .button{
        height: 50px; 
        width: 100px; 
    }

    h1 {
        font-size: 50px;
        font-family: "Arial Bold", Arial, Sans-serif;
        margin-top: 0em;
        margin-bottom: 0em;
        margin-left: 0;
        margin-right: 0;
        color: red;
        font-weight: bold;
    }

    h41 {
        font-size: 20px;
        font-family: "Arial Bold", Arial, Sans-serif;
        margin-top: 0em;
        margin-bottom: 0em;
        margin-left: 0;
        margin-right: 0;
        color: red;
        font-weight: bold;
    }

    h42 {
        font-size: 20px;
        font-family: "Arial Bold", Arial, Sans-serif;
        margin-top: 0em;
        margin-bottom: 0em;
        margin-left: 0;
        margin-right: 0;
        color: green;
        font-weight: bold;
    }

    .middle {
      display: table-cell;
      vertical-align: middle;
  }
</style>
<script>
    function call(id){
        window.location.href = "proses_antri.php?id="+id;
    }
</script>
</head>
<body>
    <?php
    include "koneksi.php";

    session_start();

    $poli = $_SESSION['poli'];
    
    date_default_timezone_set('Asia/Jakarta');
    $tgl = DATE('Y M d');

    $query = "SELECT * FROM V_QP7ANTRIAN WHERE tgl_antrian='".$tgl."' AND status <> 0 AND jam_pasien_timbang_selesai is null AND Nama_Poli='".$poli."' order by nomor_antrian";
    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $sql = sqlsrv_query( $conn, $query , $params, $options );
    $row_count = sqlsrv_num_rows( $sql );
    if ($row_count == 0) {
        echo "
        <center>
        <table border=1 id='antriannya'>
        <tr>
        <td width=150px align=center class='middle'><div align=\"center\"><h3>No. Antrian</h3></div></td>
        <td width=100px align=center class='middle'><div align=\"center\"><h3>Panggil</h3></div></td>
        <td width=300px align=center class='middle'><div align=\"center\"><h3>Status</h3></div></td>
        </tr>
        </table>";
    } else {
        if ($sql){
            echo "
            <table border=1 id='antriannya'>
            <tr>
            <td width=150px align=center class='middle'><div align=\"center\"><h3>No. Antrian</h3></div></td>
            <td width=100px align=center class='middle'><div align=\"center\"><h3>Panggil</h3></div></td>
            <td width=300px align=center class='middle'><div align=\"center\"><h3>Status</h3></div></td>
            </tr>";
            while($rs = sqlsrv_fetch_array($sql)){

                if ($rs['status'] == 1) { 
                    $status='<h41>Belum Timbang</h41>';
                } else if ($rs['status'] == 2) { 
                    $status='<h42>Sudah Dipanggil</h42>';
                }

                echo "
                <tr>
                <td width=150px align=center class='middle'><div align=\"center\"><h3>".$rs['nomor_antrian']."</h3></div></td>
                <td width=100px align=center class='middle'><div align=\"center\"><input type=\"image\" src=\"../RuangTimbang/Images/CALL.PNG\" 
                onclick=\"call('".$rs['id']."')\"></input></div></td>
                <td width=300px align=center class='middle'><div align=\"center\">".$status."</div></td>
                </tr>";
            }
        }
        echo"</table></center>";
    }
    ?>


</body>