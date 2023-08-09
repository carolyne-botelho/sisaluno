<?php

require_once "../conexao.php";

$stmt = $conexao->prepare("SELECT * FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professores</title>
</head>
<style>

body {
  font-family: Arial, sans-serif;
  background-color: rgb(252, 208, 215);
}

.box {
  width: 80%;
  max-width: 800px;
  margin: 50px auto;
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

table {
  width: 100%;
  border-collapse: collapse;
}

table th,
table td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

table th {
  background-color: #f9f9f9;
}

table a {
  display: inline-block;
  margin-right: 10px;
  text-decoration: none;
  color: #007bff;
  transition: color 0.3s ease;
}

table a:hover {
  color: #0056b3;
}

.box a {
  display: block;
  margin-bottom: 10px;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  color: black;
  border-radius: 5px;
}

.box a:nth-child(1) {
  background-color: #007bff;
}

.box a:nth-child(2) {
  background-color: #dc3545;
}

.box a:hover {
  opacity: 0.8;
}

</style>
<body>

<div class="box">
        <h1>Relação de Professores</h1>
        <br>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Idade</th>
                <th>Data de Nascimento</th>
                <th>Endereço</th>
                <th>Ações</th>
                
            </tr>
            <?php foreach ($professores as $professor) { ?>
                <tr>
                    <td><?php echo $professor['id']; ?></td>
                    <td><?php echo $professor['nome']; ?></td>
                    <td><?php echo $professor['cpf']; ?></td>
                    <td><?php echo $professor['idade']; ?></td>
                    <td><?php echo $professor['datanascimento']; ?></td>
                    <td><?php echo $professor['endereco']; ?></td>
                    <td>
                        <a class="alterar" href="alterar.php?id=<?php echo $professor['id']; ?>">Alterar</a>
                        <a class="excluir" href="excluir.php?id=<?php echo $professor['id']; ?>">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <br>
        <br>
        <a href="inserir.php">Cadastrar Professor</a>
        <a class="voltar" href="../index.php">Gerenciar Sistema</a>
    </div>
</body>
</html>
