<?php 

    require_once 'classes/funcionarios.php';
    $acao = new Funcionarios;
    $acao->conectar();

    $id = filter_input(INPUT_GET, 'id');
    if($id) {
        $sql = $pdo->prepare("DELETE FROM funcionarios WHERE id_funcionario = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

    }

    header('location: lista.php');


?>
