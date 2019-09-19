<?php

session_start();

if ($_SESSION['tipo_usuario'] == 0) {
    $cnpjContEmpresa = $_SESSION['cpf_admin'];
} else if ($_SESSION['tipo_usuario' == 1]) {
    $cnpjContEmpresa = $_SESSION['cnpj_cont'];
}


if (isset($_POST['gravar'])) {
    include '../controller/conexao.php';
    include '../model/empresa.php';
    include '../model/itemContadorEmpresa.php';

    $cnpj = $_POST['cnpj'];
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
        $verificarCNPJ = verificarCNPJ($cnpj);

        if (count($verificarCNPJ) > 0) {
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
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_date, 1);";
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

            if ($stmt->execute()) {
                $id_item_contador_empresa = $conn->lastInsertId();

                $stmt2 = $conn->prepare("INSERT INTO public.item_contador_empresa(
                id_item_contador_empresa, cnpj_cont, cnpj_empresa, data_integracao_contadorempresa)
                VALUES (?, ?, ?, current_date);");

                $stmt2->bindParam(1, $cnpj);
                $stmt2->bindParam(2, $cnpjContEmpresa);
                $stmt2->bindParam(3, $id_item_contador_empresa);
                
                if ($stmt2->execute()) {
                    $msg = 'Empresa cadastrada com sucesso!';
                    header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
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

    $cnpj = $_POST = ['cnpj'];

    echo 'CNPJ: ' . $cnpj;

    $nome = $_POST['nome'];
    $nomef = $_POST['nomef'];
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
	SET nome_empresa=?, nome_fantasia_empresa=?, 
        cep_empresa=?, logradouro_empresa=?, complemento_logradouro_empresa=?, 
        numero_logradouro_empresa=?, bairro_logradouro_empresa=?, cidade_logradouro_empresa=?, 
        uf_logradouro_empresa=?, telefone_empresa=?, email_empresa=?, usuario_login_empresa=?, 
        senha_login_empresa=?, status_empresa=?, data_integracao=?, tipo_usuario=?
	WHERE cnpj_empresa=?;";

    header('location: ../view/contador_cadastrar.php?mensagem=' . $sql);

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $nomef);
    $stmt->bindParam(3, $cep);
    $stmt->bindParam(4, $logradouro);
    $stmt->bindParam(5, $complemento_logradouro);
    $stmt->bindParam(6, $numero_logradouro);
    $stmt->bindParam(7, $bairro_logradouro);
    $stmt->bindParam(8, $cidade_logradouro);
    $stmt->bindParam(9, $estado_logradouro);
    $stmt->bindParam(10, $telefone);
    $stmt->bindParam(11, $email);
    $stmt->bindParam(12, $usuario_login);
    $stmt->bindParam(13, $senha_login);
    $stmt->bindParam(14, $status);
    $stmt->bindParam(15, $cnpj);

    if ($stmt->execute()) {
        $msg = 'Empresa atualizada com sucesso!';
        header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
    } else {
        $msg = 'Erro ao atualizar Empresa!';
        header('location: ../view/empresa_cadastrar.php?mensagem=' . $msg);
    }
}

function verificarCNPJ($cnpj) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("select * from empresa where cnpj_empresa = '" . $cnpj . "';");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirContador($cnpj) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("delete from empresa where cnpj_empresa = '" . $cnpj . "';");
    $stmt->execute();
}

?>