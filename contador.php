<?php
// ¡IMPORTANTE! Necesario para que GitHub pueda llamar a tu script
header("Access-Control-Allow-Origin: *"); 

// DATOS DE CONEXIÓN (Revisa si el prefijo es cph41)
$host = "localhost";
$usuario = "cph41_admin";       
$pass = "Administrador123";    
$db = "cph41_miweb_clics";     

// Conectar
$conn = new mysqli($host, $usuario, $pass, $db);

// Si hay error, salimos silenciosamente
if ($conn->connect_error) {
    die();
}

// Lógica del contador
if (isset($_GET['elemento'])) {
    $elemento = $conn->real_escape_string($_GET['elemento']);
    
    // SQL: Inserta 1 o suma 1 si el elemento ya existe
    $sql = "INSERT INTO registro_clics (nombre_elemento, cantidad) VALUES ('$elemento', 1)
            ON DUPLICATE KEY UPDATE cantidad = cantidad + 1";
            
    $conn->query($sql);
}

$conn->close();
?>