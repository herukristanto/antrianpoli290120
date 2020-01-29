<html>
<head>
<body bgcolor="#BFFBC0"> 
<?
//command from button
$comm = $_GET['Btn'];
$counter = $_GET['Counter'];

// Fuction untuk send message to socet server
$host="172.16.109.221"; 
$port = 5631;


$fp = fsockopen ($host, $port, $errno, $errstr,30);
switch($comm){
	case "lab":
		if ($counter == 1){
			$message = "lab1";
			break;
		}
		elseif ($counter == 2){
			$message = "lab2";
			break;
		}
		elseif ($counter == 3){
			$message = "lab3";
			break;
		}
		elseif ($counter == 4){
			$message = "lab4";
			break;
		}		
}
if (!$fp) { 
	$result = "Error: could not open socket connection"; 
	} 
else {
	fwrite($fp, $message);
	fclose ($fp);
		if ($comm != "Hold") {
			echo "<H2>Mohon tunggu hingga suara selesai";
			header("refresh:5; url=listdata.php");
		}
		else{
			echo "<H2>Hold nomor antrian";
			header("refresh:3; url=listdata.php");
			//header('Location: listdata.php');
		}
}
?>
</body>
</head>
</html>