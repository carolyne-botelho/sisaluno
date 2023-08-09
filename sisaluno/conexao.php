<?php 

$servername = "10.70.230.53:3306";
$username = "sisaluno";
$password = "sisaluno2023";
$dbname = "sisaluno"; 

try {
    $conexao = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>