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

      <form class="form-horizontal" action="printer_proses.php" method="post">

        <div class="control-group">
          <label class="control-label" for="namepoli">Nama Poli</label>
          <div class="controls">
            <input type="text" name="namepoli" id="namepoli">
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="nameprinter">Nama Printer</label>
          <div class="controls">
            <input type="text" name="nameprinter" id="nameprinter">
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
