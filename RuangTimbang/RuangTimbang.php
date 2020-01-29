
<?php
include "koneksi.php";
session_start();
ini_set('memory_limit', -1);
?>

<!DOCTYPE HTML>
<html>
<head>
  <!-- <p align="center"><img src="Images/header.png" width="1000" height="140"></p> -->

  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv="expires" content="-1">
  <meta http-equiv="pragma" content="no-cache">

  <meta http-equiv="refresh" content="5" >

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


  <title>RUANG TIMBANG</title>
  <style type="text/css">
    nav ul ul {
     display: none;
   }
   nav ul li:hover > ul {
     display: block;
   }
   nav ul {
     background: #efefef;
     padding: 0;
     list-style: none;
     position: relative;
     display: inline-table;
   }
   nav ul:after {
     content: ""; clear: both; display: block;
   }
   nav ul li {
     float: left;
   }
   nav ul li:hover {
     background: #4b545f;
   }
   nav ul li:hover a {
     color: #fff;
   }
   nav ul li a {
     display: block; padding: 0px 30px;
     color: #757575; text-decoration: none;
   }
   nav ul ul {
     background: #5f6975; border-radius: 0px; padding: 0;
     position: absolute; top: 100%;
   }
   nav ul ul li {
     float: none;
     border-top: 1px solid #6b727c;
     border-bottom: 1px solid #575f6a;
     position: relative;
   }
   nav ul ul li a {
     padding: 0px 30px;
     color: #fff;
   } 
   nav ul ul li a:hover {
     background: #4b545f;
   }
   nav ul ul ul {
     position: absolute; left: 100%; top:0;
   }
   body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
  }
  #Container {
    margin-right: auto;
    margin-left: auto;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
  }
  #Header {
    height: 200px;
    width: 800px;
    margin-right: auto;
    margin-left: auto;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    background-attachment: fixed;
    background-image: url(header.jpg);
    background-repeat: no-repeat;
    background-position: center top;
  }
  #NavBar {
    height: 20px;
    width: 800px;
    margin-right: auto;
    margin-left: auto;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
  }
  #MainContent {
    height: auto;
    width: 800px;
    margin-right: auto;
    margin-left: auto;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
  }
  #Footer {
    height: 100px;
    width: 800px;
    margin-right: auto;
    margin-left: auto;
    border-top-width: 0px;
    border-right-width: 0px;
    border-bottom-width: 0px;
    border-left-width: 0px;
    border-top-style: solid;
    border-right-style: solid;
    border-bottom-style: solid;
    border-left-style: solid;
    font-size: 10px;
    color: #000;
  }
  body,td,th {
    font-family: Tahoma, Geneva, sans-serif;
    font-size: 18px;
  }
</style>

<link href="style.css" rel="stylesheet"/>
<style type="text/css">
  <!--
  -->

  /*VERTIKAL*/
/*@import url(http://fonts.googleapis.com/css?family=Oxygen+Mono);
/* Please Keep this font import at the very top of any CSS file */
/*@charset "UTF-8";
/* Starter CSS for Flyout Menu */
#cssmenu {
  /* padding: 0; */
  padding-top:5px;
  padding-bottom:5px; 
  /* margin: 0; */
  margin-top:200px;
  border: 0;
  line-height: 1;
}
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
#cssmenu ul {
  position: relative;
  z-index: 597;
  float: left;
}
#cssmenu ul li {
  float: left;
  min-height: 1px;
  line-height: 1em;
  vertical-align: middle;
  position: relative;
}
#cssmenu ul li.hover,
#cssmenu ul li:hover {
  position: relative;
  z-index: 599;
  cursor: default;
}
#cssmenu ul ul {
  visibility: hidden;
  position: absolute;
  top: 100%;
  left: 0px;
  z-index: 598;
  width: 100%;
}
#cssmenu ul ul li {
  float: none;
}
#cssmenu ul ul ul {
  top: -2px;
  right: 0;
}
#cssmenu ul li:hover > ul {
  visibility: visible;
}
#cssmenu ul ul {
  top: 1px;
  left: 99%;
}
#cssmenu ul li {
  float: none;
}
#cssmenu ul ul {
  margin-top: 1px;
}
#cssmenu ul ul li {
  font-weight: normal;
}
/* Custom CSS Styles */
#cssmenu {
  width: 200px;
  background: #333333;
  font-family: 'Oxygen Mono', Tahoma, Arial, sans-serif;
  zoom: 1;
  font-size: 14px;
}
#cssmenu:before {
  content: '';
  display: block;
}
#cssmenu:after {
  content: '';
  display: table;
  clear: both;
}
#cssmenu a {
  display: block;
  padding: 15px 20px;
  color: #ffffff;
  text-decoration: none;
  text-transform: uppercase;
}
#cssmenu > ul {
  width: 200px;
}
#cssmenu ul ul {
  width: 200px;
}
#cssmenu > ul > li > a {
  border-right: 4px solid #1b9bff;
  color: #ffffff;
}
#cssmenu > ul > li > a:hover {
  color: #ffffff;
}
#cssmenu > ul > li.active a {
  background: #1b9bff;
}
#cssmenu > ul > li a:hover,
#cssmenu > ul > li:hover a {
  background: #1b9bff;
}
#cssmenu li {
  position: relative;
  z-index:100;
}
#cssmenu ul li.has-sub > a:after {
  content: '+';
  position: absolute;
  top: 50%;
  right: 15px;
  margin-top: -6px;
}
#cssmenu ul ul li.first {
  -webkit-border-radius: 0 3px 0 0;
  -moz-border-radius: 0 3px 0 0;
  border-radius: 0 3px 0 0;
}
#cssmenu ul ul li.last {
  -webkit-border-radius: 0 0 3px 0;
  -moz-border-radius: 0 0 3px 0;
  border-radius: 0 0 3px 0;
  border-bottom: 0;
}
#cssmenu ul ul {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}
#cssmenu ul ul {
  border: 1px solid #0082e7;
}
#cssmenu ul ul a {
  /* font-size: 12px; */
  font-size: 14px;
  color: #ffffff;
}
#cssmenu ul ul a:hover {
  color: #ffffff;
}
#cssmenu ul ul li {
  border-bottom: 1px solid #0082e7;
}
#cssmenu ul ul li:hover > a {
  background: #4eb1ff;
  color: #ffffff;
}
#cssmenu.align-right > ul > li > a {
  border-left: 4px solid #1b9bff;
  border-right: none;
}
#cssmenu.align-right {
  float: right;
}
#cssmenu.align-right li {
  text-align: right;
}
#cssmenu.align-right ul li.has-sub > a:before {
  content: '+';
  position: absolute;
  top: 50%;
  left: 15px;
  margin-top: -6px;
}
#cssmenu.align-right ul li.has-sub > a:after {
  content: none;
}
#cssmenu.align-right ul ul {
  visibility: hidden;
  position: absolute;
  top: 0;
  left: -100%;
  z-index: 598;
  width: 100%;
}
#cssmenu.align-right ul ul li.first {
  -webkit-border-radius: 3px 0 0 0;
  -moz-border-radius: 3px 0 0 0;
  border-radius: 3px 0 0 0;
}
#cssmenu.align-right ul ul li.last {
  -webkit-border-radius: 0 0 0 3px;
  -moz-border-radius: 0 0 0 3px;
  border-radius: 0 0 0 3px;
}
#cssmenu.align-right ul ul {
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}
/*VERTIKAL*/
#Layer1 {
  position:absolute;
  left:348px;
  top:286px;
  width:624px;
  height:590px;
  z-index:10;
  overflow: scroll;
}
#Layer2 {
  position:absolute;
  left:200px;
  top:-158px;
  width:5px;
  height:27000px;
  z-index:11;
  background-color: #000066;
}
.style28 {font-size: 20px; }
.style36 {color: #9900CC; font-size: 22px; }
.style37 {font-size: 22px; }
.style38 {color: #9900CC; font-size: 20px; }
</style>

<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/date_time.js"></script>



<table id="MyTable2" border=0 align="right">
  <tr>
    <td><button type=button onClick="logout();" class="tombol">Logout</button></td>
  </tr>
</table>


<script type="text/javascript">

  function konfirmasi(){  
    tanya = confirm("YAKIN INGIN CANCEL ???");
    if (tanya == true) return true;
    else return false;
  }


  function call(R){
   window.location.href = "proses_antri.php?cmd=call&id="+R;
 } 

</script>

</head>
<body bgcolor="">

 <div align="left"><span id="date_time" style="font-size:25px; color:#009933"></span>
   <script type="text/javascript">window.onload = date_time('date_time');</script>
   
   <br>
   <?php
   $poli = $_SESSION["poli"];

   echo "<font color=orange size=5px>".$poli."</font>";
   ?>
 </br>

 <div>
 </div>
 <div align="center" id="2">

  <div id="Layer1">
    <div align="center">
      <table width="565" height="50" border="2" align="center" cellpadding="5" bordercolor="#3300FF">
        <thead>
          <tr>
            <td width="119" height="46"><div align="center" class="style38">No. Antrian</div>
              <div align="center" class="style36">
                <div align="center"></div>
              </div></td>
              <!--<td><div align="center">Kode</div></td>-->
              <td width="165"><div align="center" class="style38">Ruang Timbang </div></td>
              <td width="233"><div align="center" class="style36">
                <div align="center" class="style28">Status </div>
              </div></td>
            </tr>
          </thead>
          <tbody>
            <?php
            $date = date('Y/m/d 00:00:00');

            $query = "SELECT * FROM V_QP7ANTRIAN WHERE tgl_antrian = CONVERT(DATETIME,'".$date."', 102) AND status <> 0 AND jam_pasien_timbang_selesai is null AND Nama_Poli = '".$poli."' 
            order by nomor_antrian";


            $sql = sqlsrv_query($conn,$query);

            if ($sql)
            { 
              while($rows = sqlsrv_fetch_array($sql))
              {
                ?>
                <tr>
                  <td height="39"><div align="center" class="style37">
                    <?php echo $rows['nomor_antrian']?>
                  </div>
                  <div align="center" class="style37"></div></td>
                  <td><div align="center" class="style37">
                    <input name="image" type="image" onClick="call(<?php echo $rows['id'];?>)" src="../RuangTimbang/Images/CALL.PNG" />
                  </div></td>
                  <td><div align="center" class="style37">
                    <div align="center">
                      <?php if($rows['status'] == 1)
                      { echo '<i style="color:red;font-size:23px;font-family:calibri ;">
                      Belum Timbang </i> '; }
                      elseif($rows['status'] == 2)
                       { echo '<i style="color:blue;font-size:23px;font-family:calibri ;">
                     Sudah Dipanggil </i> '; }
                     ?>

                   </div>
                 </div></td>
               </tr>
               <?php
             }
           } 
           else { ?>
           <tr>
            <td colspan="4" align="center">Tidak Ada Antrian</td>
          </tr>
          <?php  } ?>
        </tbody>
      </table>
      <div align="center"> </div>
    </div>
  </div>

  <table width="278" height="220" border="2" cellpadding="5" bordercolor="#3300FF">
    <thead>
      <tr>
        <td height="38"><div align="center" class="style28">

          <div align="center"><span class="style38 style28">Ruang Timbang  </span></div>
        </div></td>
      </tr>
      <tr>
        <td height="84">

          <div align="center">

            <?php 
            $RT = "SELECT * FROM QP7TEMPLAST WHERE Nama_Poli Like '%".$poli."'";

            $sqlRT = sqlsrv_query($conn,$RT);

            $isiRT = sqlsrv_fetch_array($sqlRT);

            echo "<b style='color:red;font-size:60px;font-family:calibri ;'>".$isiRT['RuangTimbang']."</b>";

            $nomorantrian = $isiRT['RuangTimbang'];

            ?>
          </div></td>
        </tr>
        <tr>
          <td width="258" height="47"><div align="center">

            <input type="image" src="../RuangTimbang/Images/button_complete.PNG" onClick="complete('<?php echo $isiRT['RuangTimbang'];?>')" />

            <input type="image" src="../RuangTimbang/Images/button_cancel.PNG" onClick="cancel('<?php echo $isiRT['RuangTimbang'];?>')" />

          </div></td>
        </tr>
      </thead> 
    </table>
    <!--<div align="center"></div>-->



    <script>
     function complete(Cr){
      window.location.href = "proses_after_call.php?cmd=complete&id="+Cr;
    } 

    function skip(Sk){
      window.location.href = "proses_after_call.php?cmd=skip&id="+Sk;
    } 

    function cancel(Cn){
      var cf=confirm("Anda Yakin Ingin Cancel");
      if(cf)
      { 
       window.location.href = "proses_after_call.php?cmd=cancel&id="+Cn; }
       else {
       }
     } 

     function logout(){
      window.location.href='logout.php';
    }
  </script>
</div>
</tbody>
</table>



</body>
</html>

