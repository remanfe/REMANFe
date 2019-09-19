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
        <title>REMANFe | Listar</title>
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
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="../index.php" class="logo">
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
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">REMANFe</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- Imagem do usuário -->
                                    <li class="user-header">
                                        <img src="../components/dist/img/avatar.png" class="img-circle" alt="Imagem de Perfil">
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
                                            <a href="../controller/logout.php" class="btn btn-default btn-flat">Sair</a>
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
                        Listar
                        <small>Contador</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Listar</li>
                    </ol>
                </section>
                <section class="content-header">
                    <form action="empresa_listar.php" method="POST">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Nome:</label>
                                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome" />
                                </div>
                                <div class="col-md-2 button-listar">
                                    <input type="submit" value="Buscar" class="btn btn-bitbucket form-control" />
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-3 button-cadastrar">
                                    <a href="empresa_cadastrar.php"><input type="button" value="Cadastrar Empresa" class="btn btn-success form-control" /></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-hover table-striped">
                        <tr class="row">
                            <th class="col-md-3">
                                <span><b>Nome</b></span>			
                            </th>	
                            <th class="col-md-2">
                                <span><b>CNPJ</b></span>			
                            </th>
                            <th class="col-md-3">
                                <span><b>E-mail</b></span>			
                            </th>
                            <th class="col-md-2">
                                <span><b>Telefone</b></span>			
                            </th>
                            <th class="col-md-3">
                                <span><b>Ações</b></span>
                            </th>
                        </tr>
                        <?php
                        if (isset($_POST['nome'])) {
                            include_once('../controller/conexao.php');

                            $conn = conexao();
                            $stmt = $conn->prepare("select * from empresa where nome_empresa LIKE '%" . $_POST['nome'] . "%' ORDER BY nome_empresa;");
                            $stmt->execute();

                            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            for ($i = 0; $i < count($retorno); $i++) {
                                echo "<tr class='row'>";
                                echo "	<td class='col-md-3'>";
                                echo "		<span>" . $retorno[$i]['nome_empresa'] . "</span>";
                                echo "	</td>";
                                echo "<td class='col-md-2'>";
                                echo "		<span>" . $retorno[$i]['cnpj_empresa'] . "</span>";
                                echo "</td>";
                                echo "<td class='col-md-3'>";
                                echo "		<span>" . $retorno[$i]['email_empresa'] . "</span>";
                                echo "</td>";
                                echo "<td class='col-md-2'>";
                                echo "		<span>" . $retorno[$i]['telefone_empresa'] . "</span>";
                                echo "</td>";
                                echo "<td class='col-md-3'>";
                                echo "	<a href='?acao=atualizar&cnpj=" . $retorno[$i]['cnpj_cont'] . "'><img src='../components/images/icons/edit16.png' alt='Editar' title='Editar' class='img-espaco'></a>";
                                echo "	<a href='?acao=excluir&cnpj=" . $retorno[$i]['cnpj_cont'] . "'><img src='../components/images/icons/delete16.png' alt='Excluir' title='Excluir' class='img-espaco'></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
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
    </body>
</html>
<?php
include_once ('../controller/empresaCTL.php');
if (isset($_REQUEST['acao'])) {
    if ($_REQUEST['acao'] == "excluir") {
        excluirAdmin($_REQUEST['cnpj']);
        echo "<script language='javascript'> alert('Empresa excluído com sucesso!')</script>";
    } else if ($_REQUEST['acao'] == "atualizar") {
        echo "<script>document.location.href='empresa_cadastrar.php?cnpj=" . $_REQUEST['cnpj'] . "'</script>";
    }
}
?>