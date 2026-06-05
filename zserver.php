<?php
// Actualización Junio 2026
// Diagnóstico del servidor

echo "<h2>Información del Servidor</h2>";

echo "PHP_SELF > " . ($_SERVER['PHP_SELF'] ?? '') . "<br>";
echo "SERVER_NAME > " . ($_SERVER['SERVER_NAME'] ?? '') . "<br>";
echo "HTTP_HOST > " . ($_SERVER['HTTP_HOST'] ?? '') . "<br>";
echo "HTTP_REFERER > " . ($_SERVER['HTTP_REFERER'] ?? 'No informado') . "<br>";
echo "HTTP_USER_AGENT > " . ($_SERVER['HTTP_USER_AGENT'] ?? '') . "<br>";
echo "SCRIPT_NAME > " . ($_SERVER['SCRIPT_NAME'] ?? '') . "<br>";
echo "SERVER_ADDR > " . ($_SERVER['SERVER_ADDR'] ?? '') . "<br>";
echo "REMOTE_ADDR > " . ($_SERVER['REMOTE_ADDR'] ?? '') . "<br>";
echo "REQUEST_URI > " . ($_SERVER['REQUEST_URI'] ?? '') . "<br>";
echo "DOCUMENT_ROOT > " . ($_SERVER['DOCUMENT_ROOT'] ?? '') . "<br>";
echo "SERVER_SOFTWARE > " . ($_SERVER['SERVER_SOFTWARE'] ?? '') . "<br>";
echo "PHP_VERSION > " . PHP_VERSION . "<br>";