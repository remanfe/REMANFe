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
        <title>REMANFe | Página Inicial</title>
        <!-- Diga ao navegador para responder à largura da tela -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="components/css/AdminLTE.min.css">
        <!-- Skin AdminLTE. -->
        <!--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">-->
        <link rel="stylesheet" href="components/css/skins/skin-blue.min.css">
        <!-- jQuery 3 -->
        <script src="components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="components/js/adminlte.min.js"></script>
        <!--Style-->
        <link rel="stylesheet" href="components/css/style.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <!-- mini logotipo para barra lateral 50x50 pixels -->
                    <!--<span class="logo-mini"><b>RMF</b></span>-->
                    <!-- logotipo para estado regular e dispositivos móveis -->
                    <!--<span class="logo-lg"><b>REMANFe</b></span>-->
                    <img src="components/images/sigla-branco.png" class="img-responsivo">
                </a>
                <!-- Header Navbar: o estilo pode ser encontrado em header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Menu lateral</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: o estilo pode ser encontrado em dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <span><i class="fa fa-user-o"></i>
                                        <?php
                                        if ($_SESSION['tipo_usuario'] == 0) {
                                            echo $_SESSION['nome_admin'] . " - Administrador";
                                        } else if ($_SESSION['tipo_usuario'] == 1) {
                                            echo $_SESSION['nome_cont'] . " - Contador";
                                        } else if ($_SESSION['tipo_usuario'] == 2) {
                                            echo $_SESSION['nome_empresa'] . " - Empresa";
                                        }
                                        ?>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Imagem do usuário -->
                                    <li class="user-header">
                                        <img src="components/dist/img/avatar.png" class="img-circle" alt="Imagem de Perfil">
                                        <p>
                                            <?php
                                            if ($_SESSION['tipo_usuario'] == 0) {
                                                echo $_SESSION['nome_admin'] . " - Administrador";
                                            } else if ($_SESSION['tipo_usuario'] == 1) {
                                                echo $_SESSION['nome_cont'] . " - Contador";
                                            } else if ($_SESSION['tipo_usuario'] == 2) {
                                                echo $_SESSION['nome_empresa'] . " - Empresa";
                                            }
                                            ?>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Dados cadastrais</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="controller/logout.php" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /.header -->
            </header>

            <?php
            if ($_SESSION['tipo_usuario'] == 0) {
//                include_once('view/menu_admin.php');
                ?>
                <!-- Coluna do lado esquerdo. Contém o logotipo e a barra lateral. -->
                <aside class="main-sidebar">
                    <!-- sidebar: estilo pode ser encontrado em sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MENU</li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-user-plus"></i><span>CADASTRAR e LISTAR</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="view/admin_listar.php"><i class="fa fa-circle-o"></i>Administrador</a></li>
                                    <li><a href="view/contador_listar.php"><i class="fa fa-circle-o"></i>Contador</a></li>
                                    <li><a href="view/empresa_listar.php"><i class="fa fa-circle-o"></i>Empresa</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-edit"></i><span>NF-e (Nota Fiscal Eletrônica)</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="view/upload_nfe.php"><i class="fa fa-upload"></i>UPLOAD NF-e</a></li>
                                    <li><a href="view/download_nfe.php"><i class="fa fa-download"></i>DOWNLOAD NF-e</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-print"></i><span>GERAR DANFe</span>
                                </a>
                            </li>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <?php
            } else if ($_SESSION['tipo_usuario'] == 1) {
//                include_once('view/menu_contador.php');
                ?>
                <!-- Coluna do lado esquerdo. Contém o logotipo e a barra lateral. -->
                <aside class="main-sidebar">
                    <!-- sidebar: estilo pode ser encontrado em sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MENU</li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-user-plus"></i><span>CADASTRAR e LISTAR</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="view/empresa_listar.php"><i class="fa fa-circle-o"></i>Empresa</a></li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-edit"></i><span>NF-e (Nota Fiscal Eletrônica)</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="view/upload_nfe.php"><i class="fa fa-upload"></i>UPLOAD NF-e</a></li>
                                    <li><a href="view/download_nfe.php"><i class="fa fa-download"></i>DOWNLOAD NF-e</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-print"></i><span>GERAR DANFe</span>
                                </a>
                            </li>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <?php
            } else if ($_SESSION['tipo_usuario'] == 2) {
//                include_once('view/menu_empresa.php');
                ?>
                <!-- Coluna do lado esquerdo. Contém o logotipo e a barra lateral. -->
                <aside class="main-sidebar">
                    <!-- sidebar: estilo pode ser encontrado em sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar menu: : style can be found in sidebar.less -->
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="header">MENU</li>
                            <li class="treeview">
                                <a href="">
                                    <i class="fa fa-edit"></i><span>NF-e (Nota Fiscal Eletrônica)</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="view/upload_nfe.php"><i class="fa fa-upload"></i>UPLOAD NF-e</a></li>
                                    <li><a href="view/download_nfe.php"><i class="fa fa-download"></i>DOWNLOAD NF-e</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-print"></i><span>GERAR DANFe</span>
                                </a>
                            </li>
                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>
                <?php
            }
            ?>

            <!-- Content Wrapper. Contém o conteúdo da página -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Página Incial
                        <small>Utilize as opções do menu lateral esquerdo</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a><i class="fa fa-home"></i>Inicio</a></li>
                    </ol>
                </section>
                <section class="content-header">
                    HELLO WORLD!
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> Beta
                </div>
                <strong>Copyright &copy; 2019 REMANFe.</strong> Todos os direitos reservados.
            </footer>

            <!-- Adicione o sidebar. Este div deve ser colocado imediatamente após a barra lateral de controle. -->
            <div class="control-sidebar-bg"></div>
        </div>
    </body>
</html>
