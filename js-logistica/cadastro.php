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
    <title>Faça seu cadastro</title>
</head>
<body>

    <div class="content-form">
        <h2>Cadastre-se</h2>
        <form method="post">

            <div class="form-group">
                <input type="text" class="form-control" name="nome" placeholder="digite seu nome..." autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="digite seu e-mail..." autocomplete="off" required> 
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="senha" placeholder="digite sua senha..." autocomplete="off" required>
            </div>

            <input type="submit" id="btnLogar" name="cadastrar" value="cadastrar">
            <p>ja tem conta? <a href="login.php">Faça login</a></p>
        </form>
    </div>

<?php 
     $acao->conectar();

     if(isset($_POST['cadastrar'])) {
         $name = addslashes($_POST['nome']);
         $email = addslashes($_POST['email']);
         $senha = addslashes($_POST['senha']);

         $acao->cadastrarUsers($name,$email,$senha);
     }


?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>