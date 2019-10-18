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
        <title>REMANFe | Listar Empresa</title>
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
                        Listar
                        <small>Empresa</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Listar Empresa</li>
                    </ol>
                </section>
                <section class="content-header">
                    <form action="empresa_listar.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>Pesquisar por nome:</label>
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
                            $stmt = $conn->prepare("select * from empresa where nome_empresa iLIKE '%" . $_POST['nome'] . "%' ORDER BY nome_empresa;");
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
                                echo "	<a href='?acao=atualizar&cnpj=" . $retorno[$i]['cnpj_empresa'] . "'><img src='../components/images/icons/edit16.png' alt='Editar' title='Editar' class='img-espaco'></a>";
                                echo "	<a href='?acao=excluir&cnpj=" . $retorno[$i]['cnpj_empresa'] . "'><img src='../components/images/icons/delete16.png' alt='Excluir' title='Excluir' class='img-espaco'></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>
                    <strong>
                        <?php
                        if (isset($_REQUEST['mensagem'])) {
                            echo " " . $_REQUEST['mensagem'];
                        }
                        ?>
                    </strong>
                </section>
            </div>
            <?php
            include_once './footer.php';
            ?>
        </div>
    </body>
</html>
<?php
include_once ('../controller/empresaCTL.php');
if (isset($_REQUEST['acao'])) {
    if ($_REQUEST['acao'] == "excluir") {
        try {
            excluirEmpresa($_REQUEST['cnpj']);
            echo "<script language='javascript'> alert('Empresa excluída com sucesso!')</script>";
        } catch (PDOException $ex) {
            echo "<script language='javascript'> alert('Não foi possível excluir a Empresa! Esta possui NF-e cadastradas.')</script>";
        }
    } else {
        echo "<script language='javascript'> alert('Não foi possível excluir a Empresa! Esta possui NF-e cadastradas.')</script>";
    }
    if ($_REQUEST['acao'] == "atualizar") {
        echo "<script>document.location.href='empresa_cadastrar.php?cnpj=" . $_REQUEST['cnpj'] . "'</script>";
    }
}
?>