<?php 

    require_once 'classes/funcionarios.php';
    $acao = new Funcionarios;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Fazer login</title>
</head>
<body>

    <div class="content-form">
        <h2>Faça login</h2>
        <form method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="digite seu e-mail..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="senha" placeholder="digite sua senha..." autocomplete="off" required>
            </div>

            <input type="submit" id="btnLogar" name="logar" value="acessar">
            <p>Ainda não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
        </form>
    </div>

<?php 

    $acao->conectar();

    if(isset($_POST['logar'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if($acao->logar($email,$senha) == true) {
            if(isset($_SESSION['logado'])) {
                header('location: index.php');
            }else {
                echo "<script> alert('Dados incorretos!') </script>";
            }
        }else {
            echo "<script> alert('Dados incorretos!') </script>";
        }
    }


?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>