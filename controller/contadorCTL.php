<?php

if (isset($_POST['gravar'])) {
    include '../controller/conexao.php';
    include '../model/contador.php';

    $cnpj = $_POST['cnpj'];
    $nome = $_POST['nome'];
    $nomef = $_POST['nomef'];
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
        header('location: ../view/contador_cadastrar.php?mensagem=' . $msg);
    } else {
        $verificarCNPJ = verificarCNPJ($cnpj);

        if (count($verificarCNPJ) > 0) {
            $msg = 'O CNPJ informado já foi cadastrado! Verifique-o, por gentileza.';
            header('location: ../view/contador_cadastrar.php?mensagem=' . $msg);
        } else {
            $conn = conexao();
            $sql = "INSERT INTO public.contador(
	cnpj_cont, cpf_admin, ie_cont, nome_cont, nome_fantasia_cont, cep_cont, logradouro_cont, 
        complemento_logradouro_cont, numero_logradouro_cont, bairro_logradouro_cont, cidade_logradouro_cont, 
        uf_logradouro_cont, telefone_cont, email_cont, usuario_login_cont, senha_login_cont, status_cont, 
        data_integracao, tipo_usuario)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_date, 1);";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $cnpj);
            $stmt->bindParam(2, $_SESSION['cpf_admin']);
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
                $msg = 'Contador cadastrado com sucesso!';
                header('location: ../view/contador_cadastrar.php?mensagem=' . $msg);
            } else {
                $msg = 'Erro ao cadastrar contador!';
                header('location: ../view/contador_cadastrar.php?mensagem=' . $msg);
            }
        }
    }
}

function verificarCNPJ($cnpj) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("select * from contador where cnpj_cont = '" . $cnpj . "';");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirContador($cnpj) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("delete from contador where cnpj_cont = '" . $cnpj . "';");
    $stmt->execute();
}

?>