<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Excluir Disciplina</title>
</head>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: rgb(252, 208, 215);
}

.box {
  width: 80%;
  max-width: 400px;
  margin: 100px auto;
  padding: 20px;
  background-color: pink;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

h1 {
  text-align: center;
  font-size: 24px;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 10px;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
  background-color: #0056b3;
}

.voltar {
  display: block;
  text-align: center;
  text-decoration: none;
  background-color: #dc3545;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  margin-top: 20px;
}

.voltar:hover {
  background-color: #c82333;
}

</style>
<body>

<div class="box">
      <h1>Excluir Disciplina</h1>
      <form method="post" action="excluir.php">
        Nome da Disciplina: <br>
        <input type="text" id="nomedisciplina" name="nomedisciplina" placeholder="Digite o nome da disciplina para confirmar" required> <br>
        <input type="submit" value="Excluir">
        <a class="voltar" href="index.php">Gerenciar Disciplina</a>
      </form>
  </div>
  
</body>
</html>

<?php

require_once "../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomedisciplina = $_POST["nomedisciplina"];

  $stmt = $conexao->prepare("DELETE FROM disciplina WHERE nomedisciplina = :nomedisciplina");
  $stmt->bindParam(':nomedisciplina', $nomedisciplina);

  $stmt->execute();

  header("Location: index.php");
  exit();
}
?>

