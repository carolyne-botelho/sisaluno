<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Disciplina</title>
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
        <h1>Inserir Disciplina</h1>

        <form method="post" action="inserir.php">
            <p>Nome: <br> <input type="text" placeholder="Digite o nome da disciplina" name="nomedisciplina" maxlength= "100" required></p>
            <p>Carga Horária: <br> <input type="number" placeholder="Digite a carga horária" name="ch" maxlength= "3" required></p>
            <p>Semestre: <br> <input type="number" placeholder="Digite o semestre" name="semestre" maxlength= "5" required></p>
            <p>ID do Professor: <br> <input type="number" placeholder="Digite o ID do professor" name="idprofessor" required></p>
            <br>
        <input type="submit" value="Cadastrar"><br>
        <a class="retornar" href="index.php">Gerenciamento de Disciplinas</a>
        </form>
    </div>
</body>
</html>

<?php

require_once "../conexao.php";

if (isset($_POST['nomedisciplina'])) {

    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];

    $stmt = $conexao->prepare("INSERT INTO disciplina (nomedisciplina, ch, semestre, idprofessor) VALUES (:nomedisciplina, :ch, :semestre, :idprofessor)");
    $stmt->bindParam(':nomedisciplina', $nomedisciplina);
    $stmt->bindParam(':ch', $ch);
    $stmt->bindParam(':semestre', $semestre);
    $stmt->bindParam(':idprofessor', $idprofessor);

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>