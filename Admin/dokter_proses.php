
<?php
include "koneksi.php";
date_default_timezone_set("Asia/Bangkok");

	 // Check If form submitted, insert form data into users table.
	 // if(isset($_POST['Submit'])) {
		 $id_dokter					= $_POST['dokterid'];
		 $nama_dokter				= $_POST['namadokter'];
		 $status_dokter   	= $_POST['statusdokter'];
		 $create_at			  	= $_POST['create_at'];
		 $create_time				= date("Y-m-d");
     $submit            = $_POST['simpan'];


     if ($submit == "new") {
       $tsql = "insert into QP7DOCTOR values('".$id_dokter."',
                             '".$nama_dokter."',
                             '".$status_dokter."',
                             '".$create_at."',
                             '".$create_time."')";

           $result = sqlsrv_query( $conn, $tsql);

           if ( $result )
           {
               $something = "Submission successful.";
           		echo
           		"
            		<script>
            		alert('Data Dengan ID : ".$id_dokter."  Berhasil Ditambah');
            		window.location.href='dokter.php?pesan=input';
            		</script>";
           }
           else
           {
                $something = "Submission unsuccessful.";
                die( print_r( sqlsrv_errors(), true));
           }
           $output=$something;
           /* Free statement and connection resources. */
           sqlsrv_free_stmt( $result);
           sqlsrv_close( $conn);
     }elseif ($submit == "update") {
       $tsql1 = "update QP7DOCTOR set
                                      Name = '".$nama_dokter."',
                                      Status = '".$status_dokter."',
                                      Create_By = '".$create_at."',
                                      Create_Time = '".$create_time."'
                                      where Doctor_Id = '".$id_dokter."'";

           $result = sqlsrv_query( $conn, $tsql1);

           if ( $result )
           {
               $something = "Submission successful.";
           		echo
           		"
            		<script>
                alert('Data Dengan ID : ".$id_dokter."  Berhasil Di Update');
                window.location.href='dokter.php?pesan=update';
                </script>";
           }
           else
           {
                $something = "Submission unsuccessful.";
                die( print_r( sqlsrv_errors(), true));
           }
           $output=$something;
           /* Free statement and connection resources. */
           sqlsrv_free_stmt( $result);
           sqlsrv_close( $conn);
     }

				?>
