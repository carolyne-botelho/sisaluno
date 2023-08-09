<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
</head>

<style>
body {
  font-family: Arial, sans-serif;
  background-color:  rgb(252, 208, 215);
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

.box a {
  display: block;
  margin-bottom: 10px;
  padding: 10px;
  text-decoration: none;
  color: #333;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #f9f9f9;
  transition: background-color 0.3s ease;
}

.box a:hover {
  background-color: #e0e0e0;
}

</style>

<body>
    <div class="box">
        <h1>Sistema Escolar</h1>
            <a href="sisaluno/index.php">Gerenciamento de Alunos</a>
            <br> 
            <a href="sisprofessor/index.php">Gerenciamento de Professores</a>
            <br>
            <a href="sisdisciplina/index.php">Gerenciamento de Disciplinas</a>
            <br>
    </div>
</body>
</html>