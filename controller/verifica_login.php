<?php

if (isset($_POST['usuario'])) {
    include('conexao.php');
    session_start();

    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];

    $conn = conexao();

    $stmt = $conn->prepare("SELECT * FROM administrador WHERE usuario_login_admin = ? and senha_login_admin = ?;");
    $stmt->bindParam(1, $usuario_login);
    $stmt->bindParam(2, $senha_login);
    $stmt->execute();

    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($res != null) {
        //Gravando valores dentro da sessão aberta:
        $_SESSION['cpf_admin'] = $res[0]['cpf_admin'];
        $_SESSION['nome_admin'] = $res[0]['nome_admin'];
        $_SESSION['tipo_usuario'] = $res[0]['tipo_usuario'];
        $_SESSION['status_admin'] = $res[0]['status_admin'];

        if ($_SESSION['status_admin'] == 'Ativo') {
            header('location: ../index.php');
        } else {
            header('location: ../login.php');
            $msg = 'Erro ao efetuar login!';
            header('location: ../login.php?mensagem=' . $msg);
        }
    } else {
        header('location: ../login.php');
            $msg = 'Erro ao efetuar login, verifique os dados de acesso!';
            header('location: ../login.php?mensagem=' . $msg);
//            header('location: ../login.php');
    }
} else {
    header('location: ../login.php');
}
?>