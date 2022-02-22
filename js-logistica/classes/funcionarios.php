<?php

    session_start();

    class Funcionarios {
        public $pdo;

        function conectar() {
            global $pdo;
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=js_logistica','root','');
                //echo 'conectado com sucesso'; 
            }catch(PDOException $e) {
                //echo "erro ao conectar";
            }
        }

        function cadastrarUsers($name,$email,$senha) {
            global $pdo;
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email_usuario = :email");
            $sql->bindValue(':email', $email);
            $sql->execute();
            if($sql->rowCount() > 0) {
                echo "<script> alert('Ja existe um usuário com esse email!') </script>";
            }else {
                $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?)");
                $sql->execute(array($name,$email,$senha));
                echo "<script> alert('Cadastro realizado com sucesso') </script>";
                echo "<script> window.location.href = 'login.php'</script>";
            }
        }

        function logar($email,$senha) {
            global $pdo;
            $sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email_usuario = :email AND senha_usuario = :senha");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':senha', $senha);
            $sql->execute();


            if($sql->rowCount() > 0) {
                $dado = $sql->fetch();

                $_SESSION['logado'] = $dado['id_usuario'];
                return true;
            }else {
               return false;
            }
        }

        function cadastrar($nome,$cargo,$idade,$cidade,$estado,$telefone) {
            global $pdo;

            $sql = $pdo->prepare("SELECT id_funcionario FROM funcionarios WHERE nome_funcionario = :nome"); 
            $sql->bindValue(":nome", $nome);
            $sql->execute();
            if($sql->rowCount() > 0) {
                echo "<script> alert('Ja existe um funcionário com esse nome!') </script>";
            }else {
                $sql = $pdo->prepare("INSERT INTO funcionarios VALUES (null,?,?,?,?,?,?)");
                $sql->execute(array($nome,$cargo,$idade,$cidade,$estado,$telefone));
                echo "<script> alert('Dados cadastrados com sucesso!') </script>";
                echo "<script> window.location.href = 'lista.php' </script>";
            }
        }

        function atualizar() {
            global $pdo;

            $id = filter_input(INPUT_POST, 'id');
            $nome = filter_input(INPUT_POST, 'nome_func');
            $cargo = filter_input(INPUT_POST, 'cargo_func');
            $idade = filter_input(INPUT_POST, 'idade_func');
            $cidade= filter_input(INPUT_POST, 'cidade_func');
            $estado = filter_input(INPUT_POST, 'estado_func');
            $telefone = filter_input(INPUT_POST, 'telefone_func');

           if($id && $nome && $cargo && $idade && $cidade && $estado && $telefone) {
                $sql = $pdo->prepare("UPDATE funcionarios SET nome_funcionario = :nome, cargo_funcionario = :cargo, idade_funcionario = :idade, cidade_funcionario = :cidade, estado_funcionario = :estado, telefone_funcionario = :telefone WHERE id_funcionario = :id");
                $sql->bindValue('nome', $nome);
                $sql->bindValue('cargo', $cargo);
                $sql->bindValue('idade', $idade);
                $sql->bindValue('cidade', $cidade);
                $sql->bindValue('estado', $estado);
                $sql->bindValue('telefone', $telefone);
                $sql->bindValue('id', $id);
                $sql->execute();
                
                echo "<script> alert('dados atualizados com sucesso!') </script>";
                echo "<script> window.location.href = 'lista.php'</script>";
           }else {
               header('location: editar.php');
           }
            
        }

        
    }

?>