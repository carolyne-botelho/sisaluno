<?php

require_once "../conexao.php";

if (!isset($_GET["id"])) {

  header("Location: index.php");
  exit();
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nomedisciplina = $_POST["nomedisciplina"];
  $ch = $_POST["ch"];
  $semestre = $_POST["semestre"];
  $idprofessor = $_POST["idprofessor"];

  $stmt = $conexao->prepare("UPDATE disciplina SET nomedisciplina = :nomedisciplina, ch = :ch, semestre = :semestre, idprofessor = :idprofessor  WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->bindParam(':nomedisciplina', $nomedisciplina);
  $stmt->bindParam(':ch', $ch);
  $stmt->bindParam(':semestre', $semestre);
  $stmt->bindParam(':idprofessor', $idprofessor);

  $stmt->execute();

  header("Location: index.php");
  exit();
}

$stmt = $conexao->prepare("SELECT * FROM disciplina WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$disciplina = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alterar Disciplina</title>
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
    <h1>Alterar Disciplina</h1>
      <form method="post">
            <p> <br> <input type="hidden" name="id" value="<?php echo $disciplina['id']; ?>"></p>

            <p>Nome: <br> <input type="text" placeholder="Digite o nome da disciplina" name="nomedisciplina" maxlength= "100" required value="<?php echo $disciplina['nomedisciplina']; ?>"></p>
            
            <p>Carga Horária: <br> <input type="number" placeholder="Digite a carga horária" name="ch" maxlength= "3" required value="<?php echo $disciplina['ch']; ?>"></p>
            
            <p>Semestre: <br> <input type="number" placeholder="Digite o semestre" name="semestre" maxlength= "5" required value="<?php echo $disciplina['semestre']; ?>" ></p>
            
            <p>ID do Professor: <br> <input type="number" placeholder="Digite o ID do professor" name="idprofessor" required value="<?php echo $disciplina['idprofessor']; ?>"></p>
          <br>
        <input type="submit" value="Alterar"><br>
        <a class="retornar" href="index.php">Gerenciar Disciplinas</a>
    </form>
  </div>
</body>
</html>



 