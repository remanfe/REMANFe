<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>REMANFe | Dashboard</title>
        <!-- Diga ao navegador para responder à largura da tela -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="css/AdminLTE.min.css">
        <!-- Skin AdminLTE. -->
        <!--<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">-->
        <link rel="stylesheet" href="css/skins/skin-blue.min.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logotipo para barra lateral 50x50 pixels -->
                    <span class="logo-mini"><b>RMF</b></span>
                    <!-- logotipo para estado regular e dispositivos móveis -->
                    <span class="logo-lg"><b>REMANFe</b></span>
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
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">REMANFe</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Imagem do usuário -->
                                    <li class="user-header">
                                        <img src="dist/img/avatar5.png" class="img-circle" alt="Imagem de Perfil">
                                        <p>REMANFe - Admin</p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Dados cadastrais</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /.header -->
            </header>
            <!-- Coluna do lado esquerdo. Contém o logotipo e a barra lateral. -->
            <aside class="main-sidebar">
                <!-- sidebar: estilo pode ser encontrado em sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="dist/img/avatar5.png" class="img-circle" alt="Imagem de Perfil">
                        </div>
                        <div class="pull-left info">
                            <p>Usuário REMANFe</p>
                        </div>
                    </div>
                    <!-- Sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU</li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-plus"></i><span>CADASTRAR</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i>Administrador</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>Contador</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i>Empresa</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i><span>NF-e (Nota Fiscal Eletrônica)</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-upload"></i>UPLOAD NF-e</a></li>
                                <li><a href="#"><i class="fa fa-download"></i>DOWNLOAD NF-e</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-print"></i><span>GERAR DANFe</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contém o conteúdo da página -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Painel de Controle</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <section class="content-header">
                    HELLO WORLD!
                </section>
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

        <!-- jQuery 3 -->
        <script src="components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="components/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="js/adminlte.min.js"></script>
    </body>
</html>
