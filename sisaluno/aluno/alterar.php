<?php

require_once "../conexao.php";

if (!isset($_GET["id"])) {

  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $datanascimento = $_POST["datanascimento"];
  $endereco = $_POST["endereco"];
  $estatus = $_POST["estatus"];

  $stmt = $conexao->prepare("UPDATE aluno SET nome = :nome, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :estatus WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nome', $nome);
  $stmt->bindParam(':idade', $idade);
  $stmt->bindParam(':datanascimento', $datanascimento);
  $stmt->bindParam(':endereco', $endereco);
  $stmt->bindParam(':estatus', $estatus);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

$stmt = $conexao->prepare("SELECT * FROM aluno WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Aluno</title>
</head>
<style>
    
    body {
      font-family: Arial, sans-serif;
      background-color: rgb(252, 208, 215);
      margin: 0;
      padding: 0;
    }

    .box {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: pink;
      border: 1px solid #ccc;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    form p {
      margin: 10px 0;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
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
    <h1>Alterar Aluno</h1>
      <form method="post">
            <p> <br> <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>"></p>

            <p>Nome: <br> <input type="text" placeholder="Digite seu nome" name="nome" maxlength= "100" required value="<?php echo $aluno['nome']; ?>"></p>
            
            <p>Idade: <br> <input type="number" placeholder="Digite sua idade" name="idade" required value="<?php echo $aluno['idade']; ?>"></p>
            
            <p>Data de Nascimento: <br> <input type="date" placeholder="Digite sua data de nascimento" name="datanascimento" required value="<?php echo $aluno['datanascimento']; ?>" ></p>
            
            <p>Endereço: <br> <input type="text" placeholder="Digite seu endereço" name="endereco" maxlength= "100" required value="<?php echo $aluno['endereco']; ?>"></p>
            
            <p>Status: <br> <select name="estatus" id="estatus" required>
            
            <option value="<?php echo $aluno['estatus']; ?>"><?php echo $aluno['estatus']; ?></option>
            <option value="Aprovado">Aprovado</option>
            <option value="Reprovado">Reprovado</option>
            <option value="Trancado">Trancado</option>
          </select> <br> <br>
        <input type="submit" value="Alterar"><br>
        <a class="retornar" href="index.php">Gerenciar Alunos</a>
    </form>
  </div>
</body>

</html>
  
</body>
</html>


 