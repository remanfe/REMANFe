<?php

if (isset($_POST['gravar'])) {
    include '../controller/conexao.php';
    include '../model/administrador.php';

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento_logradouro = $_POST['complemento'];
    $numero_logradouro = $_POST['numero'];
    $bairro_logradouro = $_POST['bairro'];
    $cidade_logradouro = $_POST['cidade'];
    $estado_logradouro = $_POST['estado'];
    $celular = $_POST['celular'];
    $celular_comercial = $_POST['celular_com'];
    $email = $_POST['email'];
    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];
    $status = $_POST['status'];

    if (empty($cpf)) {
        $msg = 'CPF não informado! Verifique-o, por gentileza.';
        header('location: ../view/admin_cadastrar.php?mensagem=' . $msg);
    } else {
        $verificarCPF = verificarCPF($cpf);

        if (count($verificarCPF) > 0) {
            $msg = 'O CPF informado já foi cadastrado! Verifique-o, por gentileza.';
            header('location: ../view/admin_cadastrar.php?mensagem=' . $msg);
        } else {
            $conn = conexao();
            $stmt = $conn->prepare("INSERT INTO public.administrador(
	cpf_admin, nome_admin, cep_admin, logradouro_admin, complemento_logradouro_admin, numero_logradouro_admin, 
        bairro_logradouro_admin, cidade_logradouro_admin, uf_logradouro_admin, celular_admin, 
        celular_comercial_admin, email_admin, usuario_login_admin, senha_login_admin, 
        status_admin, data_integracao, tipo_usuario)
	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_date, 0);");
            $stmt->bindParam(1, $cpf);
            $stmt->bindParam(2, $nome);
            $stmt->bindParam(3, $cep);
            $stmt->bindParam(4, $logradouro);
            $stmt->bindParam(5, $complemento_logradouro);
            $stmt->bindParam(6, $numero_logradouro);
            $stmt->bindParam(7, $bairro_logradouro);
            $stmt->bindParam(8, $cidade_logradouro);
            $stmt->bindParam(9, $estado_logradouro);
            $stmt->bindParam(10, $celular);
            $stmt->bindParam(11, $celular_comercial);
            $stmt->bindParam(12, $email);
            $stmt->bindParam(13, $usuario_login);
            $stmt->bindParam(14, $senha_login);
            $stmt->bindParam(15, $status);

            if ($stmt->execute()) {
                $msg = 'Administrador cadastrado com sucesso!';
                header('location: ../view/admin_listar.php?mensagem=' . $msg);
            } else {
                $msg = 'Erro ao cadastrar administrador!';
                header('location: ../view/admin_cadastrar.php?mensagem=' . $msg);
            }
        }
    }
} else if (isset($_POST['atualizar'])) {
    include '../controller/conexao.php';
    include '../model/administrador.php';

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento_logradouro = $_POST['complemento'];
    $numero_logradouro = $_POST['numero'];
    $bairro_logradouro = $_POST['bairro'];
    $cidade_logradouro = $_POST['cidade'];
    $estado_logradouro = $_POST['estado'];
    $celular = $_POST['celular'];
    $celular_comercial = $_POST['celular_com'];
    $email = $_POST['email'];
    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];
    $status = $_POST['status'];

    $conn = conexao();
    $sql = "UPDATE public.administrador 
	SET nome_admin=?, cep_admin=?, logradouro_admin=?, complemento_logradouro_admin=?, 
        numero_logradouro_admin=?, bairro_logradouro_admin=?, cidade_logradouro_admin=?, 
        uf_logradouro_admin=?, celular_admin=?, celular_comercial_admin=?, email_admin=?, 
        usuario_login_admin=?, senha_login_admin=?, status_admin=? 
	WHERE cpf_admin=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cep);
    $stmt->bindParam(3, $logradouro);
    $stmt->bindParam(4, $complemento_logradouro);
    $stmt->bindParam(5, $numero_logradouro);
    $stmt->bindParam(6, $bairro_logradouro);
    $stmt->bindParam(7, $cidade_logradouro);
    $stmt->bindParam(8, $estado_logradouro);
    $stmt->bindParam(9, $celular);
    $stmt->bindParam(10, $celular_comercial);
    $stmt->bindParam(11, $email);
    $stmt->bindParam(12, $usuario_login);
    $stmt->bindParam(13, $senha_login);
    $stmt->bindParam(14, $status);
    $stmt->bindParam(15, $cpf);

    if ($stmt->execute()) {
        $msg = 'Administrador atualizado com sucesso!';
        header('location: ../view/admin_listar.php?mensagem=' . $msg);
    } else {
        $msg = 'Erro ao atualizar administrador!';
        header('location: ../view/admin_cadastrar.php?mensagem=' . $msg);
    }
} else if (isset($_POST['atualizar_perfil'])) {
    include '../controller/conexao.php';
    include '../model/administrador.php';

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $cep = $_POST['cep'];
    $logradouro = $_POST['logradouro'];
    $complemento_logradouro = $_POST['complemento'];
    $numero_logradouro = $_POST['numero'];
    $bairro_logradouro = $_POST['bairro'];
    $cidade_logradouro = $_POST['cidade'];
    $estado_logradouro = $_POST['estado'];
    $celular = $_POST['celular'];
    $celular_comercial = $_POST['celular_com'];
    $email = $_POST['email'];
    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];
    $status = $_POST['status'];

    $conn = conexao();
    $sql = "UPDATE public.administrador 
	SET nome_admin=?, cep_admin=?, logradouro_admin=?, complemento_logradouro_admin=?, 
        numero_logradouro_admin=?, bairro_logradouro_admin=?, cidade_logradouro_admin=?, 
        uf_logradouro_admin=?, celular_admin=?, celular_comercial_admin=?, email_admin=?, 
        usuario_login_admin=?, senha_login_admin=?, status_admin=? 
	WHERE cpf_admin=?;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cep);
    $stmt->bindParam(3, $logradouro);
    $stmt->bindParam(4, $complemento_logradouro);
    $stmt->bindParam(5, $numero_logradouro);
    $stmt->bindParam(6, $bairro_logradouro);
    $stmt->bindParam(7, $cidade_logradouro);
    $stmt->bindParam(8, $estado_logradouro);
    $stmt->bindParam(9, $celular);
    $stmt->bindParam(10, $celular_comercial);
    $stmt->bindParam(11, $email);
    $stmt->bindParam(12, $usuario_login);
    $stmt->bindParam(13, $senha_login);
    $stmt->bindParam(14, $status);
    $stmt->bindParam(15, $cpf);

    if ($stmt->execute()) {
        $msg = 'Dados cadastrais atualizados com sucesso!';
        header('location: ../view/admin_perfil.php?mensagem=' . $msg);
    } else {
        $msg = 'Erro ao atualizar dados cadastrais!';
        header('location: ../view/admin_perfil.php?mensagem=' . $msg);
    }
}

function verificarCPF($cpf) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("select * from administrador where cpf_admin = '" . $cpf . "';");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirAdmin($cpf) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("delete from administrador where cpf_admin = '" . $cpf . "';");
    $stmt->execute();
}

?>
