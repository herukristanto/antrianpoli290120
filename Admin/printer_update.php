<?php
include ("_session.php");
?>

<?php
include ("_atas.php");
?>

<?php
include ("_navbar.php");
?>

<?php
include ("_menu.php");
?>



<div class="page-content">
  <div class="row-fluid">
    <div class="span12">
      <!--PAGE CONTENT BEGINS-->

      <h4>Edit Data Printer</h4>

      <?php
      include "koneksi.php";
        $id = $_GET['namepoli'];
        $query = "SELECT * FROM QP7PRINTER WHERE Poli = '$id'";
        $sql = sqlsrv_query($conn, $query);
        while ($data = sqlsrv_fetch_array($sql)) {

      ?>

      <form class="form-horizontal" action="printer_proses.php" method="POST">

        <div class="control-group">
          <label class="control-label" for="namepoli">Nama Poli</label>
          <div class="controls">
            <input type="text" name="namepoli" id="namepoli" value="<?php echo $data['Poli'] ?>" readonly>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="nameprinter">Nama Printer</label>
          <div class="controls">
            <input type="text" name="nameprinter" id="nameprinter" value="<?php echo $data['Printer'] ?>">
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary" name="simpan" value="update">Simpan</button>

            <button type="button" class="btn btn-danger" name="button">Cencel</button>
          </div>

        </div>

      </form>
    <?php } ?>
      <!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
  </div><!--/.row-fluid-->
</div><!--/.page-content-->


<?php
include ("_bawah.php");
?>
