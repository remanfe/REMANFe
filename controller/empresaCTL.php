<?php

//session_start();

if (isset($_POST['gravar'])) {
    include '../controller/conexao.php';
    include '../model/empresa.php';
    include '../model/itemContadorEmpresa.php';

    $cnpj = $_POST['cnpj'];
//    $cnpjContEmpresa = $_SESSION['cnpj_cont'];
    $cnpjContEmpresa = $_POST['cnpjc'];
    $nome = $_POST['nome'];
    $nomef = $_POST['nomef'];
    $crt = $_POST['crt'];
    $ie = $_POST['ie'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento_logradouro = $_POST['complemento'];
    $numero_logradouro = $_POST['numero'];
    $bairro_logradouro = $_POST['bairro'];
    $cidade_logradouro = $_POST['cidade'];
    $estado_logradouro = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];
    $status = $_POST['status'];

    if (empty($cnpj)) {
        $msg = 'CNPJ não informado! Verifique-o, por gentileza.';
        header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
    } else {
        $verificarCNPJempresa = verificarCNPJempresa($cnpj);

        if (count($verificarCNPJempresa) > 0) {
            $msg = 'O CNPJ informado já foi cadastrado! Verifique-o, por gentileza.';
            header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
        } else {
            $conn = conexao();
            $sql = "INSERT INTO public.empresa(
	cnpj_empresa, crt_empresa, ie_empresa, nome_empresa, nome_fantasia_empresa, 
        cep_empresa, logradouro_empresa, complemento_logradouro_empresa, 
        numero_logradouro_empresa, bairro_logradouro_empresa, cidade_logradouro_empresa, 
        uf_logradouro_empresa, telefone_empresa, email_empresa, usuario_login_empresa, 
        senha_login_empresa, status_empresa, data_integracao, tipo_usuario)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_date, 2);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $cnpj);
            $stmt->bindParam(2, $crt);
            $stmt->bindParam(3, $ie);
            $stmt->bindParam(4, $nome);
            $stmt->bindParam(5, $nomef);
            $stmt->bindParam(6, $cep);
            $stmt->bindParam(7, $logradouro);
            $stmt->bindParam(8, $complemento_logradouro);
            $stmt->bindParam(9, $numero_logradouro);
            $stmt->bindParam(10, $bairro_logradouro);
            $stmt->bindParam(11, $cidade_logradouro);
            $stmt->bindParam(12, $estado_logradouro);
            $stmt->bindParam(13, $telefone);
            $stmt->bindParam(14, $email);
            $stmt->bindParam(15, $usuario_login);
            $stmt->bindParam(16, $senha_login);
            $stmt->bindParam(17, $status);
            
            echo 'CNPJJJJJJJJJJJJJJJ = ' . $cnpjContEmpresa;

            if ($stmt->execute()) {
//                $id_item_contador_empresa = $conn->lastInsertId();

                $stmt2 = $conn->prepare("INSERT INTO public.item_contador_empresa(
                cnpj_cont, cnpj_empresa, data_integracao_contadorempresa)
                VALUES (?, ?, current_date);");

                $stmt2->bindParam(1, $cnpjContEmpresa);
                $stmt2->bindParam(2, $cnpj);
//                $stmt2->bindParam(3, $id_item_contador_empresa);

                if ($stmt2->execute()) {
                    $msg = 'Empresa cadastrada com sucesso!';
                    header('location: ../view/empresa_listar.php?mensagem=' . $msg);
                } else {
                    $msg = 'Erro ao cadastrar Empresa!';
                    header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
                }
            }
        }
    }
} else if (isset($_POST['atualizar'])) {
    include '../controller/conexao.php';
    include '../model/empresa.php';

    $cnpj = $_POST['cnpj'];

    echo 'CNPJ: ' . $cnpj;

    $nome = $_POST['nome'];
    $nomef = $_POST['nomef'];
    $crt = $_POST['crt'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento_logradouro = $_POST['complemento'];
    $numero_logradouro = $_POST['numero'];
    $bairro_logradouro = $_POST['bairro'];
    $cidade_logradouro = $_POST['cidade'];
    $estado_logradouro = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];
    $status = $_POST['status'];

    $conn = conexao();
    $sql = "UPDATE public.empresa
	SET crt_empresa=?, nome_empresa=?, nome_fantasia_empresa=?,
        cep_empresa=?, logradouro_empresa=?, complemento_logradouro_empresa=?, 
        numero_logradouro_empresa=?, bairro_logradouro_empresa=?, cidade_logradouro_empresa=?, 
        uf_logradouro_empresa=?, telefone_empresa=?, email_empresa=?, usuario_login_empresa=?, 
        senha_login_empresa=?, status_empresa=?
	WHERE cnpj_empresa=?;";

    header('location: ../view/contador_cadastrar.php?mensagem=' . $sql);

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $crt);
    $stmt->bindParam(2, $nome);
    $stmt->bindParam(3, $nomef);
    $stmt->bindParam(4, $cep);
    $stmt->bindParam(5, $logradouro);
    $stmt->bindParam(6, $complemento_logradouro);
    $stmt->bindParam(7, $numero_logradouro);
    $stmt->bindParam(8, $bairro_logradouro);
    $stmt->bindParam(9, $cidade_logradouro);
    $stmt->bindParam(10, $estado_logradouro);
    $stmt->bindParam(11, $telefone);
    $stmt->bindParam(12, $email);
    $stmt->bindParam(13, $usuario_login);
    $stmt->bindParam(14, $senha_login);
    $stmt->bindParam(15, $status);
    $stmt->bindParam(16, $cnpj);

    if ($stmt->execute()) {
        $msg = 'Empresa atualizada com sucesso!';
        header('location: ../view/empresa_listar.php?mensagem=' . $msg);
    } else {
        $msg = 'Erro ao atualizar Empresa!';
        header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
    }
}

function verificarCNPJempresa($cnpj) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("select * from empresa  where cnpj_empresa = '" . $cnpj . "';");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirEmpresa($cnpj) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("delete from item_contador_empresa where cnpj_empresa = '" . $cnpj . "';");

    if ($stmt->execute()) {
        $stmt2 = $conn->prepare("delete from empresa where cnpj_empresa = '" . $cnpj . "';");
        $stmt2->execute();
    }
}

?>