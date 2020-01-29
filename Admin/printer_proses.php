
<?php
include "koneksi.php";
date_default_timezone_set("Asia/Bangkok");

	 // Check If form submitted, insert form data into users table.
	 // if(isset($_POST['Submit'])) {
		 $namepoli					= $_POST['namepoli'];
		 $nameprinter				= $_POST['nameprinter'];

     $submit            = $_POST['simpan'];


     if ($submit == "new") {
       $tsql = "insert into QP7PRINTER values('".$namepoli."','".$nameprinter."')";

           $result = sqlsrv_query( $conn, $tsql);

           if ( $result )
           {
               $something = "Submission successful.";
           		echo
           		"
            		<script>
            		alert('POLIKLINIK : ".$namepoli." Dengan Printer : ".$nameprinter."  Berhasil Ditambah');
            		window.location.href='printer.php?pesan=input';
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
       $tsql1 = "update QP7PRINTER set
                                      Poli = '".$namepoli."',
                                      Printer = '".$nameprinter."'
                                      where Poli = '".$namepoli."'";

           $result = sqlsrv_query( $conn, $tsql1);

           if ( $result )
           {
               $something = "Submission successful.";
           		echo
           		"
							<script>
							alert('POLIKLINIK : ".$namepoli." Dengan Printer : ".$nameprinter."  Berhasil DiUpdate');
							window.location.href='printer.php?pesan=update';
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
