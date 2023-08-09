<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
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

form p {
  margin-bottom: 15px;
}

form input,
form select {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

form input[type="submit"] {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
  background-color: #0056b3;
}

.retornar {
  display: block;
  text-align: center;
  text-decoration: none;
  background-color: #dc3545;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  margin-top: 20px;
}

.retornar:hover {
  background-color: #c82333;
}

</style>
<body>
    <div class="box">
        <h1>Inserir Aluno</h1>

        <form method="post" action="inserir.php">
            <p>Nome: <br> <input type="text" placeholder="Digite seu nome" name="nome" maxlength= "100" required></p>
            <p>Idade: <br> <input type="number" placeholder="Digite sua idade" name="idade"required></p>
            <p>Data de Nascimento: <br> <input type="date" placeholder="Digite sua data de nascimento" name="datanascimento" required></p>
            <p>Endereço: <br> <input type="text" placeholder="Digite seu endereço" name="endereco" maxlength= "100" required></p>
            <p>Status: <br> <select name="estatus" id="estatus">
            <option value="Aprovado">Aprovado</option>
            <option value="Reprovado">Reprovado</option>
            <option value="Trancado">Trancado</option></select> <br> <br>
        <input type="submit" value="Cadastrar"><br>
        <a class="retornar" href="index.php">Gerenciamento do Aluno</a>
        </form>
    </div>
</body>
</html>

<?php

require_once "../conexao.php";

if (isset($_POST['nome'])) {

    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $estatus = $_POST["estatus"];

    $stmt = $conexao->prepare("INSERT INTO aluno (nome, idade, datanascimento, endereco, estatus) VALUES (:nome, :idade, :datanascimento, :endereco, :estatus)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':datanascimento', $datanascimento);
    $stmt->bindParam(':endereco', $endereco);
    $stmt->bindParam(':estatus', $estatus);

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>