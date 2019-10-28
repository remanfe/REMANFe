<?php
session_start();
if ($_SESSION['tipo_usuario'] == 0) {
    if ($_SESSION['nome_admin'] == null) {
        header('location: ./login.php');
    }
} else if ($_SESSION['tipo_usuario'] == 1) {
    if ($_SESSION['nome_cont'] == null) {
        header('location: ./login.php');
    }
} else if ($_SESSION['tipo_usuario'] == 2) {
    if ($_SESSION['nome_empresa'] == null) {
        header('location: ./login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>REMANFe | Cadastro Administrador</title>
        <link rel="shortcut icon" href="../components/images/favicon.png">
        <!-- Diga ao navegador para responder à largura da tela -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../components/bootstrap/dist/css/bootstrap.min.css" type="text/css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../components/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../components/css/AdminLTE.min.css">
        <!-- Skin AdminLTE. -->
        <link rel="stylesheet" href="../components/css/skins/skin-blue.min.css">
        <link rel="stylesheet" type="text/css" href="../components/css/style.css">
        <!-- jQuery 3 -->
        <script src="../components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../components/js/adminlte.min.js"></script>
        <!-- Script -->
        <script type="text/javascript" src="../components/js/script.js"></script>
        <script type="text/javascript" src="../components/js/jquery/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="../components/js/jquery.mask.js"></script>
        <script type="text/javascript" src="../components/js/scriptjs.js"></script>
        <!--CSS-->
        <link rel="stylesheet" href="../components/css/style.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php
            include_once './header.php';

            if ($_SESSION['tipo_usuario'] == 0) {
                include_once('menu/menu_admin.php');
            } else if ($_SESSION['tipo_usuario'] == 1) {
                include_once('menu/menu_contador.php');
            } else if ($_SESSION['tipo_usuario'] == 2) {
                include_once('menu/menu_empresa.php');
            }
            ?>

            <!-- Content Wrapper. Contém o conteúdo da página -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Guia de Utilização
                        <small>REMANFe</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Guia</li>
                    </ol>
                    <br>
                    <p>
                        Bem-vindo ao Repositório para Manipulação de Arquivos NF-e.
                    </p>
                    <p>
                        Este é um guia de orientação à utilização do sistema.
                    </p>
                    <hr>
                    <h4>Página CADASTRAR e LISTAR > Empresa</h4>
                    <img src="../components/images/img1.png" class="img_guia">
                    <p>
                        Nessa página é possível listar todas as Empresas cadastradas e realizar a busca por nome específico. 
                        As Empresas são listadas na tabela e possuem botões de ações com funções de edição e exclusão.
                    </p>
                    <li>O botão <b>BUSCAR</b> realiza a listagem e a pesquisa por nome.</li>
                    <li>O botão <b>CADASTRAR EMPRESA</b> redireciona para a página de cadastro de empresa.</li>

                    <hr>

                    <p>
                        Nessa página é possível listar todas as Empresas cadastradas e realizar a busca por nome específico. 
                        As Empresas são listadas na tabela e possuem botões de ações com funções de edição e exclusão.
                    </p>

                    <p>
                        Nessa página é possível listar todas as Empresas cadastradas e realizar a busca por nome específico. 
                        As Empresas são listadas na tabela e possuem botões de ações com funções de edição e exclusão.
                    </p>

                    <p>
                        Nessa página é possível listar todas as Empresas cadastradas e realizar a busca por nome específico. 
                        As Empresas são listadas na tabela e possuem botões de ações com funções de edição e exclusão.
                    </p>

                    <p>
                        Nessa página é possível listar todas as Empresas cadastradas e realizar a busca por nome específico. 
                        As Empresas são listadas na tabela e possuem botões de ações com funções de edição e exclusão.
                    </p>
                </section>
            </div>
            <?php
            include_once './footer.php';
            ?>
        </div>
    </body>
</html>
