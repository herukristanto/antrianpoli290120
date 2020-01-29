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

      <h4>Create Data Doctor</h4>

      <form class="form-horizontal" action="dokter_proses.php" method="post">

        <div class="control-group">
          <label class="control-label" for="dokterid">Dockter ID</label>
          <div class="controls">
            <input type="text" name="dokterid" id="dokterid" placeholder="Masukan ID Dokter">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="namadokter">Nama</label>
          <div class="controls">
            <input type="text" name="namadokter" id="namadokter" placeholder="Masukan Nama Dokter">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="statusdokter">Status</label>
          <div class="controls">
            <input type="text" maxlength="1" name="statusdokter" id="statusdokter">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="create_at">Create By</label>
          <div class="controls">
            <input type="text" name="create_at" id="create_at" >
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary" name="simpan" value="new">Simpan</button>

            <button type="button" class="btn btn-danger" name="button">Cencel</button>
          </div>

        </div>

      </form>
      <!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
  </div><!--/.row-fluid-->
</div><!--/.page-content-->


<?php
include ("_bawah.php");
?>
