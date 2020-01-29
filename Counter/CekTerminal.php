<?php
echo "Mengetahui domain dan nama komputer";

// Mencari mapping serta counter
$terminal = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$domain = substr($terminal,-4);
$OutputTerminal = substr($terminal,0,-4);

echo "<br>";
echo "Terminal = ".$terminal;
echo "<br>";
echo "Domain = ".$domain;
echo "<br>";
echo "Output Terminal = ".$OutputTerminal;


?>