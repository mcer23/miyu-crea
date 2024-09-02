<?php
$host = 'localhost';
$dbname = 'miyu';
$username = 'root'; 
$password = 'mango123'; 

try {
   
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $nombreCompleto = $_POST['nombreCompleto'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    
    $sql = "INSERT INTO opinion_clientes (nombreCompleto, email, mensaje) VALUES (:nombreCompleto, :email, :mensaje)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombreCompleto', $nombreCompleto);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mensaje', $mensaje);
    $stmt->execute();

    echo "¡Opinión enviada con éxito!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
