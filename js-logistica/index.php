<?php 

    require_once 'classes/funcionarios.php';
    $acao = new Funcionarios;

    if(isset($_SESSION['logado']) && !empty($_SESSION['logado'])) {

    }else {
        header('location: login.php');
    }

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>JS - PAINEL</title>
</head>
<body id="body">

    <?php 
        require_once 'layouts/navbar.php';
    ?>

        <div class="container" id="content-form">
        <form method="post" class="row g-3">
            <h2>Registrar dados</h2>
        <div class="col-md-6">
            <label for="NomeFunc">Nome do Funcionário:</label>
            <input type="text" class="form-control" name="nome_func" placeholder="Digite o nome..." autocomplete="off" required>
        </div>

        <div class="col-md-6">
            <label for="SelectCargo">Cargo:</label><br>
            <input type="text" class="form-control" name="cargo_func" placeholder="Digite o cargo..." autocomplete="off" required>
        </div>

        <div class="col-md-6">
            <label for="IdadeFunc">Idade:</label>
            <input type="text" class="form-control" name="idade_func" placeholder="Digite a idade..." autocomplete="off" required>
        </div>

        <div class="col-md-6">
            <label for="CidadeFunc">Cidade:</label>
            <input type="text" class="form-control" name="cidade_func" placeholder="Digite a cidade..." autocomplete="off" required>
        </div>

        <div class="col-md-6">
            <label for="EstadoFunc">Estado:</label>
            <input type="text" class="form-control" name="estado_func" placeholder="Digite o Estado..." autocomplete="off" required>
        </div>

        <div class="col-md-6">
            <label for="EstadoFunc">Telefone:</label>
            <input type="text" class="form-control" name="telefone_func" placeholder="Digite o telefone..." autocomplete="off" required>
        </div>

        <div class="col-12">
            <input type="submit" name="cadastrar" id="btnCadastrar" value="Cadastrar funcionario">
        </div>
        </form>
        </div>

<?php

    $acao->conectar();

    if(isset($_POST['cadastrar'])) {
        $nome = addslashes($_POST['nome_func']);
        $cargo = addslashes($_POST['cargo_func']);
        $idade = addslashes($_POST['idade_func']);
        $cidade = addslashes($_POST['cidade_func']);
        $estado = addslashes($_POST['estado_func']);
        $telefone = addslashes($_POST['telefone_func']);

        $acao->cadastrar($nome,$cargo,$idade,$cidade,$estado,$telefone);
    }

?>


<?php require_once 'layouts/footer.php'; ?>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>