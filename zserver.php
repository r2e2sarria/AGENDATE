<?php
// Actualización Junio 2026

echo "PHP_SELF > ".$_SERVER['PHP_SELF'];
echo "<br>";
echo "SERVER_NAME > ".$_SERVER['SERVER_NAME'];
echo "<br>";
echo "HTTP_HOST > ".$_SERVER['HTTP_HOST'];
echo "<br>";
echo "HTTP_REFERER > ".$_SERVER['HTTP_REFERER'];
echo "<br>";
echo "HTTP_USER_AGENT > ".$_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo "SCRIPT_NAME > ".$_SERVER['SCRIPT_NAME'];
echo "<br>";
$ip_server = $_SERVER['SERVER_ADDR'];
echo "HTTP_CLIENT_IP >".$ip_server;


?>