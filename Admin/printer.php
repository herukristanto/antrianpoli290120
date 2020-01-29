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
      <div class="row-fluid">
        <?php
  	if(isset($_GET['pesan'])){
  		$pesan = $_GET['pesan'];
  		if($pesan == "input"){

  			// echo "Data berhasil di input.";
        echo "<div class='alert alert-block alert-success'>
  						  <button type='button' class='close' data-dismiss='alert'>
  							    <i class='icon-remove'></i>
  							</button>
  								<i class='icon-ok green'></i>
  								Data berhasil di input .
  							</div>";
  		}else if($pesan == "update"){
  			// echo "Data berhasil di update.";
        echo "<div class='alert alert-block alert-success'>
  						  <button type='button' class='close' data-dismiss='alert'>
  							    <i class='icon-remove'></i>
  							</button>
  								<i class='icon-ok green'></i>
  								Data berhasil di update .
  							</div>";
  		}else if($pesan == "hapus"){
  			// echo "Data berhasil di hapus.";
        echo "<div class='alert alert-block alert-danger'>
  						  <button type='button' class='close' data-dismiss='alert'>
  							    <i class='icon-remove'></i>
  							</button>

  								Data berhasil di hapus .
  							</div>";
  		}
  	}
  	?>
              <!-- <h3 class="header smaller lighter blue">Data Dokter</h3> -->
              <div class="table-header">
                  Data Dokter
              </div>

              <div id="sample-table-2_wrapper" class="dataTables_wrapper" role="grid">
                <table id="sample-table-2" class="table table-striped table-bordered table-hover dataTable" aria-describedby="sample-table-2_info">
                <thead>
                  <tr role="row">
                    <th class="" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending" style="width: 159px;">Nama Poli</th>
                    <th class="" role="columnheader" tabindex="0" aria-controls="sample-table-2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending" style="width: 106px;">Nama Printer</th>
                    <th class="center" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 150px;">
                      <a href="printer_create.php">
                      <button type="button" class="btn btn-primary" name="button"> Tambah Data</button></a>
                    </th></tr>
                </thead>


              <tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">

                <?php
                include "koneksi.php";

                    $query = "SELECT * FROM QP7PRINTER ";
                    $sql = sqlsrv_query($conn,$query);

                    while($row = sqlsrv_fetch_array($sql)){
                      $namepoli = $row['Poli'];
                      $nameprinter = $row['Printer'];

                ?>


                    <tr>
                    <td class="" ><?php echo "$namepoli"; ?></td>
                    <td class=" "><?php echo "$nameprinter"; ?></td>


                    <td class="td-actions ">
                      <div class="hidden-phone visible-desktop action-buttons">
                        <a class="blue" href="dokter.php"> <!-- printer_show.php -->
                          <i class="icon-zoom-in bigger-130"></i>
                        </a>

                        <a class="green" href="printer_update.php?namepoli=<?php echo "$namepoli"; ?>">
                          <i class="icon-pencil bigger-130"></i>
                        </a>

                        <a class="red" href="printer_delete.php?namepoli=<?php echo "$namepoli"; ?>">
                          <i class="icon-trash bigger-130"></i>
                        </a>
                      </div>

                      <div class="hidden-desktop visible-phone">
                        <div class="inline position-relative">
                          <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-caret-down icon-only bigger-120"></i>
                          </button>

                          <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                            <li>
                              <a href="#" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
                                <span class="blue">
                                  <i class="icon-zoom-in bigger-120"></i>
                                </span>
                              </a>
                            </li>

                            <li>
                              <a href="#" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
                                <span class="green">
                                  <i class="icon-edit bigger-120"></i>
                                </span>
                              </a>
                            </li>

                            <li>
                              <a href="#" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
                                <span class="red">
                                  <i class="icon-trash bigger-120"></i>
                                </span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>


</tbody></table><div class="row-fluid"><div class="span6"><div class="dataTables_info" id="sample-table-2_info">Showing 1 to 10 of 23 entries</div></div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination"><ul><li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li class="next"><a href="#"><i class="icon-double-angle-right"></i></a></li></ul></div></div></div></div>
            </div>
      <!--PAGE CONTENT ENDS-->
    </div><!--/.span-->
  </div><!--/.row-fluid-->
</div><!--/.page-content-->



<script type="text/javascript">
function update_dokter(){
  var dokter_id

  dokter_id = document.getElementById('dokter_id').value;


      window.location.href='dokter_update.php?dokter_id=' + dokter_id;

}

</script>




<?php
include ("_bawah.php");
?>
