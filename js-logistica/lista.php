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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Visualizando dados</title>
</head>
<body>

    <?php
        require_once 'layouts/navbar.php';

    ?>

        <div id="container">
        <h1>Registros</h1>
        <table id="table-special" class="table table-striped">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Cargo</th>
                <th scope="col">Idade</th>
                <th scope="col">cidade</th>
                <th scope="col">estado</th>
                <th scope="col">telefone</th>
                <th scope="col">Ações</th>
            </tr>

            <?php 

                $pdo = new PDO('mysql:host=localhost;dbname=js_logistica','root','');
                $sql = $pdo->prepare("SELECT * FROM funcionarios ORDER BY id_funcionario DESC");
                $sql->execute();
                $info = $sql->fetchAll();

                foreach ($info as $key => $value) { ?>

                <tr>
                    <td> <?php print_r($value['id_funcionario']); ?></td>
                    <td> <?php print_r($value['nome_funcionario']); ?></td>
                    <td> <?php print_r($value['cargo_funcionario']); ?></td>
                    <td> <?php print_r($value['idade_funcionario']); ?></td>
                    <td> <?php print_r($value['cidade_funcionario']); ?></td>
                    <td> <?php print_r($value['estado_funcionario']); ?></td>
                    <td> <?php print_r($value['telefone_funcionario']); ?></td>
                    <td>
                        <a id="btnEditar" href="editar.php?id=<?=$value['id_funcionario'];?>"><i class="fas fa-pen"></i></a>
                        <a id="btnExcluir" href="excluir.php?id=<?=$value['id_funcionario'];?>" onclick="return confirm('este item será excluido!')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        </div>


<?php require_once 'layouts/footer.php'; ?>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>