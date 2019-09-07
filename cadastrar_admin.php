<?php
session_start();
if ($_SESSION['nome_admin'] == null) {
    header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>REMANFe | Cadastrar</title>
        <!-- Diga ao navegador para responder à largura da tela -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css" type="text/css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="css/AdminLTE.min.css">
        <!-- Skin AdminLTE. -->
        <link rel="stylesheet" href="css/skins/skin-blue.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Script -->
        <script type="text/javascript" src="js/script.js"></script>
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
                                        <img src="dist/img/avatar.png" class="img-circle" alt="Imagem de Perfil">
                                        <p>REMANFe - Admin</p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Dados cadastrais</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="./config/logout.php" class="btn btn-default btn-flat">Sair</a>
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
                        Cadastrar
                        <small>Administrador</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="./index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Cadastrar</li>
                    </ol>
                </section>
                <section class="content-header">
                    <form action="administrador/adminCTL.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nome:</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Digite seu nome" required="true" />
                                </div>
                                <div class="col-md-2">
                                    <label>CPF:</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control" placeholder="999.999.999-99" required="true" />
                                </div>
                                <div class="col-md-3">
                                    <label>E-mail:</label>
                                    <input type="email" name="email" class="form-control" placeholder="exemplo@email.com" required="true" />
                                </div>
                                <div class="col-md-2">
                                    <label>Status:</label>
                                    <select id="cbStatus" name="status" class="form-control">
                                        <option value="ativo" >Ativo</option>
                                        <option value="inativo" >Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Celular:</label>
                                    <input type="tel" name="celular" class="form-control" placeholder="(99)99999-9999" required="true" />
                                </div>
                                <div class="col-md-2">
                                    <label>Celular comercial:</label>
                                    <input type="tel" name="celular_com" class="form-control" placeholder="(99)99999-9999" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>CEP:</label>
                                    <input type="text" name="cep" class="form-control" placeholder="99999-999" required="true" />
                                </div>
                                <div class="col-md-3">
                                    <label>Logradouro:</label>
                                    <input type="text" name="logradouro" class="form-control" placeholder="Digite sua Rua ou Avenida" required="true" />
                                </div>
                                <div class="col-md-1">
                                    <label>Número:</label>
                                    <input type="number" name="numero" class="form-control" placeholder="9999" required="true" />
                                </div>
                                <div class="col-md-2">
                                    <label>Bairro:</label>
                                    <input type="text" name="bairro" class="form-control" placeholder="Digite seu bairro" required="true" />
                                </div>
                                <div class="col-md-2">
                                    <label>Cidade:</label>
                                    <input type="text" name="cidade" class="form-control" placeholder="Digite sua cidade" required="true" />
                                </div>
                                <div class="col-md-1">
                                    <label>Estado:</label>
                                    <input type="text" name="estado" class="form-control" placeholder="UF" required="true" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Usuário:</label>
                                    <input type="text" name="usuario" class="form-control" placeholder="Usuário para login" required="true" />
                                </div>
                                <div class="col-md-2">
                                    <label>Senha:</label>
                                    <input type="password" name="senha" class="form-control" placeholder="Senha para login" required="true" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 button-cadastrar-limpar">
                                    <input type="submit" value="Cadastrar" name="gravar" class="btn btn-success form-control" />
                                </div>
                                <div class="col-md-2 button-cadastrar-limpar">
                                    <input type="reset" value="Limpar" class="btn btn-linkedin form-control">
                                </div>
                                <div class="col-md-2 button-cadastrar-limpar">
                                    <input type="button" value="Atualizar" name="atualizar" class="btn btn-tumblr form-control">
                                </div>
                            </div>
                            <h1>
                                <?php
                                include_once ('./administrador/adminCTL.php');
                                ?>
                            </h1>
                        </div>
                    </form>

                    <strong>
                        <?php
                        if (isset($_REQUEST['mensagem'])) {
                            echo " " . $_REQUEST['mensagem'];
                        }
                        ?>
                    </strong>
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
