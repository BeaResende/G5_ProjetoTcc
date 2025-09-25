<?php
$host = "localhost";      
$dbname = "bd_casa"; 
$user = "root";          
$pass = "";               

try {
   
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Erro ao conectar ao banco: " . $e->getMessage();
    exit;
}



$esp_ip_andar1 = "192.168.1.100";
$esp_ip_andar2 = "192.168.1.101";
$esp_ip_portao = "192.168.1.102";
?>
