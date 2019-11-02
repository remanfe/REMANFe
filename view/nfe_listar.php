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
        <title>REMANFe | Listar NF-e</title>
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
                        <small>NF-e</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Listar NF-e</li>
                    </ol>
                    <?php
                    include_once '../controller/nfeCTL.php';
                    if ($_SESSION['tipo_usuario'] == 1) {
                        $empresa_cont = buscarCNPJempresaContadorNFe($_SESSION['cnpj_cont']);
                        ?>
                        <br>
                        <h5>
                            Para listar as NF-e, escolha a empresa, especifique o período de emissão das NF-e que deseja listar e  
                            clique em "Buscar" e para listá-las.
                        </h5>
                        <br>
                        <form action="nfe_listar.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Empresa:</label>
                                        <select id="empresa" class="form-control" name="empresa" required="true">
                                            <option selected value="">Selecione...</option>
                                            <?php
                                            for ($i = 0; $i < count($empresa_cont); $i++) {
                                                echo"<option value='" . $empresa_cont[$i]['cnpj_empresa'] . "'>" . $empresa_cont[$i]['nome_empresa'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Data de Início:</label>
                                        <input type="date" class="form-control" id="dataini" name="dataini" required="true" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Data Final:</label>
                                        <input type="date" class="form-control" id="datafim" name="datafim" required="true" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label>Nome do destinatário da NF-e:</label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do destinatário da NF-e" />
                                    </div>
                                    <div class="col-md-2 button-listar">
                                        <input type="submit" value="Buscar" name="listar" class="btn btn-bitbucket form-control" />
                                    </div>
                                    <?php
                                    if ($_SESSION['tipo_usuario'] == 2) {
                                        ?>
                                        <div class="col-md-3 button-cadastrar">
                                            <a href="nfe_upload.php"><input type="button" value="Upload NF-e" class="btn btn-success form-control" /></a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                        <?php
                    } else if ($_SESSION['tipo_usuario'] == 2) {
                        ?>
                        <form action="nfe_listar.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nome do destinatário da NF-e:</label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do destinatário da NF-e" />
                                    </div>
                                    <div class="col-md-2 button-listar">
                                        <input type="submit" value="Buscar" name="listar" class="btn btn-bitbucket form-control" />
                                    </div>
                                    <?php
                                    if ($_SESSION['tipo_usuario'] == 2) {
                                        ?>
                                        <div class="col-md-3 button-cadastrar">
                                            <a href="nfe_upload.php"><input type="button" value="Upload NF-e" class="btn btn-dropbox form-control" /></a>
                                        </div>
                                        <?php
                                    } else {
                                        
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Data de Início:</label>
                                        <input type="date" class="form-control" id="dataini" name="dataini" required="true" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Data Final:</label>
                                        <input type="date" class="form-control" id="datafim" name="datafim" required="true" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                    ?>

                    <table class="table table-hover table-striped">
                        <tr class="row">
                            <th class="col-md-2">
                                <span><b>Código NF-e</b></span>			
                            </th>	
                            <th class="col-md-1">
                                <span><b>Data emissão</b></span>			
                            </th>
                            <th class="col-md-3">
                                <span><b>Nome do emissor</b></span>			
                            </th>
                            <th class="col-md-2">
                                <span><b>Nome do destinatário</b></span>			
                            </th>
                            <th class="col-md-3">
                                <span><b>Nome do produto</b></span>
                            </th>
                            <th class="col-md-1">
                                <span><b>Opções</b></span>
                            </th>
                        </tr>
                        <?php
                        if (isset($_POST['listar'])) {
                            include_once('../controller/conexao.php');

                            $conn = conexao();
                            if ($_SESSION['tipo_usuario'] == 1) {
                                $stmt = $conn->prepare("select * from nfe where nome_dest_nfe iLIKE '%" . $_POST['nome'] . "%'"
                                        . " and cnpj_empresa = '" . $_POST['empresa'] . "' and dhemi_nfe between '" . $_POST['dataini'] . "'"
                                        . " and '" . $_POST['datafim'] . "' ORDER BY dhemi_nfe desc;");
                            } else if ($_SESSION['tipo_usuario'] == 2) {
                                $stmt = $conn->prepare("select * from nfe where nome_dest_nfe iLIKE '%" . $_POST['nome'] . "%'"
                                        . " and cnpj_empresa = '" . $_SESSION['cnpj_empresa'] . "' and dhemi_nfe between '" . $_POST['dataini'] . "'"
                                        . " and '" . $_POST['datafim'] . "' ORDER BY dhemi_nfe desc;");
                            }
                            $stmt->execute();
                            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($retorno) > 0) {

                                for ($i = 0; $i < count($retorno); $i++) {
                                    echo "<tr class='row'>";
                                    echo "	<td class='col-md-2'>";
                                    echo "		<span>" . $retorno[$i]['cnf_nfe'] . "</span>";
                                    echo "	</td>";
                                    echo "<td class='col-md-1'>";
                                    echo "		<span>" . $retorno[$i]['dhemi_nfe'] . "</span>";
                                    echo "</td>";
                                    echo "<td class='col-md-3'>";
                                    echo "		<span>" . $retorno[$i]['nome_emit_nfe'] . "</span>";
                                    echo "</td>";
                                    echo "<td class='col-md-2'>";
                                    echo "		<span>" . $retorno[$i]['nome_dest_nfe'] . "</span>";
                                    echo "</td>";
                                    echo "</td>";
                                    echo "<td class='col-md-2'>";
                                    echo "		<span>" . $retorno[$i]['nome_prod_nfe'] . "</span>";
                                    echo "</td>";
                                    echo "</td>";
                                    echo "<td class='col-md-1'>";
                                    echo "	<a href='pdf.php?acao=gerar&codigo=" . $retorno[$i]['cnf_nfe'] . "' target='_blank'><img src='../components/images/icons/save16.png' alt='Gerar DANFe' title='Gerar DANFe' class='img-espaco'></a>";
                                    echo "	<a href='download.php?codigo=" . $retorno[$i]['cnf_nfe'] . "' target='_blank'><img src='../components/images/icons/download16.png' alt='Download' title='Download' class='img-espaco'></a>";
                                    echo "	<a href='?acao=excluir&codigo=" . $retorno[$i]['cnf_nfe'] . "'><img src='../components/images/icons/delete16.png' alt='Excluir' title='Excluir' class='img-espaco'></a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<h5><i>Nenhum registro encontrado para a filtragem realizada.</i></h5>";
                            }
                        }
                        ?>
                    </table>
                </section>
            </div>
            <?php
            include_once './footer.php';
            ?>
        </div>
    </body>
</html>
<?php
include_once ('../controller/nfeCTL.php');
if (isset($_REQUEST['acao'])) {
    if ($_REQUEST['acao'] == "excluir") {
        excluirNFe($_REQUEST['codigo']);
        echo "<script language='javascript'> alert('NF-e excluída com sucesso!')</script>";
    }
}
?>