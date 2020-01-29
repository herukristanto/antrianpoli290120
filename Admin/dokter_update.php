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

      <h4>Edit Data Doctor</h4>

      <?php
      include "koneksi.php";
        $id = $_GET['dokter_id'];
        $query = "SELECT * FROM QP7DOCTOR WHERE Doctor_id = '$id'";
        $sql = sqlsrv_query($conn, $query);
        while ($data = sqlsrv_fetch_array($sql)) {

      ?>

      <form class="form-horizontal" action="dokter_proses.php" method="POST">

        <div class="control-group">
          <label class="control-label" for="dokterid">Dockter ID</label>
          <div class="controls">
            <input type="text" name="dokterid" id="dokterid" value="<?php echo $data['Doctor_Id'] ?>" readonly>
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="namadokter">Nama</label>
          <div class="controls">
            <input type="text" name="namadokter" id="namadokter" value="<?php echo $data['Name'] ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="statusdokter">Status</label>
          <div class="controls">
            <input type="text" name="statusdokter" maxlength="1" id="statusdokter" value="<?php echo $data['Status'] ?>">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="create_at">Create By</label>
          <div class="controls">
            <input type="text" name="create_at" id="create_at" value="<?php echo $data['Create_By'] ?>" >
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
