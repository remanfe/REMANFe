<?php

if (isset($_POST['usuario'])) {
    include('conexao.php');
    session_start();

    $usuario_login = $_POST['usuario'];
    $senha_login = $_POST['senha'];

    $conn = conexao();

    $login_admin = $conn->prepare("SELECT * FROM administrador WHERE usuario_login_admin = ? and senha_login_admin = ?;");
    $login_contador = $conn->prepare("SELECT * FROM contador WHERE usuario_login_cont = ? and senha_login_cont = ?;");
    $login_empresa = $conn->prepare("SELECT * FROM empresa WHERE usuario_login_empresa = ? and senha_login_empresa = ?;");

    if ($login_admin) {
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
        } else if ($login_contador) {
//            header('location: ../login.php');
//            $msg = 'Erro ao efetuar login, verifique os dados de acesso! PRIMEIRO IF';
//            header('location: ../login.php?mensagem=' . $msg);
//            header('location: ../login.php');
            $stmt = $conn->prepare("SELECT * FROM contador WHERE usuario_login_cont = ? and senha_login_cont = ?;");
            $stmt->bindParam(1, $usuario_login);
            $stmt->bindParam(2, $senha_login);
            $stmt->execute();

            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($res != null) {
                //Gravando valores dentro da sessão aberta:
                $_SESSION['cnpj_cont'] = $res[0]['cnpj_cont'];
                $_SESSION['nome_cont'] = $res[0]['nome_cont'];
                $_SESSION['tipo_usuario'] = $res[0]['tipo_usuario'];
                $_SESSION['status_cont'] = $res[0]['status_cont'];

                if ($_SESSION['status_cont'] == 'Ativo') {
                    header('location: ../index.php');
                } else {
                    header('location: ../login.php');
                    $msg = 'Erro ao efetuar login!';
                    header('location: ../login.php?mensagem=' . $msg);
                }
            } else if ($login_empresa) {
//                    header('location: ../login.php');
//                    $msg = 'Erro ao efetuar login, verifique os dados de acesso! SEGUNDO IF';
//                    header('location: ../login.php?mensagem=' . $msg);
//            header('location: ../login.php');
                $stmt = $conn->prepare("SELECT * FROM empresa WHERE usuario_login_empresa = ? and senha_login_empresa = ?;");
                $stmt->bindParam(1, $usuario_login);
                $stmt->bindParam(2, $senha_login);
                $stmt->execute();

                $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($res != null) {
                    //Gravando valores dentro da sessão aberta:
                    $_SESSION['cnpj_empresa'] = $res[0]['cnpj_empresa'];
                    $_SESSION['nome_empresa'] = $res[0]['nome_empresa'];
                    $_SESSION['tipo_usuario'] = $res[0]['tipo_usuario'];
                    $_SESSION['status_empresa'] = $res[0]['status_empresa'];

                    if ($_SESSION['status_empresa'] == 'Ativo') {
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
            }
        }
    }
} else {
    header('location: ../login.php');
}
?>