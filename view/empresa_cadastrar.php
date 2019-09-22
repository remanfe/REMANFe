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
        <title>REMANFe | Cadastro Empresa</title>
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
                        Cadastro
                        <small>Empresa</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Cadastro Empresa</li>
                    </ol>
                </section>

                <?php
                include_once '../controller/empresaCTL.php';
                if (isset($_REQUEST['cnpj'])) {
                    $empresa = verificarCNPJempresa($_REQUEST['cnpj']);
                    ?>
                    <section class="content-header">
                        <form action="../controller/empresaCTL.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome:</label>
                                        <input required="true" type="text" value="<?php echo $empresa[0]['nome_empresa'] ?>" 
                                               name="nome" class="form-control" placeholder="Digite o nome" minlength="10" maxlength="100" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nome Fantasia:</label>
                                        <input required="true" type="text" value="<?php echo $empresa[0]['nome_fantasia_empresa'] ?>" 
                                               name="nomef" class="form-control" placeholder="Digite o nome fantasia" minlength="10" maxlength="100" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>CNPJ:</label>
                                        <input type="text" class="form-control" value="<?php echo $empresa[0]['cnpj_empresa'] ?>" 
                                               name="cnpj" id="cnpj" placeholder="99.999.999/9999-99" required="true" minlength="18" maxlength="18" readonly="true" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Inscrição Estadual:</label>
                                        <input type="text" class="form-control" value="<?php echo $empresa[0]['ie_empresa'] ?>" 
                                               name="ie" id="ie" placeholder="999999999" required="true" minlength="9" maxlength="11" readonly="true" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-md-3">
                                        <label>Cód. Reg. Tributário (CRT):</label>
                                        <select class="form-control" name="crt">
                                            <?php
                                            if ("1" == $empresa[0]['crt_empresa']) {
                                                echo "<option selected value='1'>1 - Simples Nacional</option>";
                                                echo "<option value='2'>2 - Simples Nacional, excesso de sublimite da receita bruta</option>";
                                                echo "<option value='3'>3 - Regime Normal</option>";
                                            } else if ("2" == $empresa[0]['crt_empresa']) {
                                                echo "<option value='1'>1 - Simples Nacional</option>";
                                                echo "<option selected value='2'>2 - Simples Nacional, excesso de sublimite da receita bruta</option>";
                                                echo "<option value='3'>3 - Regime Normal</option>";
                                            } else {
                                                echo "<option value='1'>1 - Simples Nacional</option>";
                                                echo "<option value='2'>2 - Simples Nacional, excesso de sublimite da receita bruta</option>";
                                                echo "<option selected value='3'>3 - Regime Normal</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>E-mail:</label>
                                        <input type="email" id="email" class="form-control" value="<?php echo $empresa[0]['email_empresa'] ?>" 
                                               name="email" placeholder="exemplo@email.com" required="true" minlength="12" maxlength="100" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Telefone:</label>
                                        <input type = "tel" class = "form-control" value = "<?php echo $empresa[0]['telefone_empresa'] ?>"
                                               name = "telefone" id = "telefone" placeholder = "(99)9999-9999" required = "true" minlength = "13" maxlength = "13" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Status:</label>
                                        <select id="cbStatus" class="form-control" name="status">
                                            <?php
                                            if ("Ativo" == $empresa[0]['status_empresa']) {
                                                echo "<option selected value='Ativo'>Ativo</option>";
                                                echo "<option value='Inativo'>Inativo</option>";
                                            } else {
                                                echo "<option value='Ativo'>Ativo</option>";
                                                echo "<option selected value='Inativo'>Inativo</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2">
                                        <label>CEP:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['cep_empresa'] ?>"
                                               name = "cep" id = "cep" placeholder = "99999-999" required = "true" minlength = "9" maxlength = "9" />
                                    </div>
                                    <div class = "col-md-3">
                                        <label>Logradouro:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['logradouro_empresa'] ?>"
                                               name = "logradouro" placeholder = "Digite a Rua ou Avenida" required = "true" minlength = "5" maxlength = "100" />
                                    </div>
                                    <div class = "col-md-3">
                                        <label>Complemento:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['complemento_logradouro_empresa'] ?>"
                                               name = "complemento" placeholder = "Digite o complemento" minlength = "2" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-1">
                                        <label>Número:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['numero_logradouro_empresa'] ?>"
                                               name = "numero" id = "numero" placeholder = "9999" required = "true" minlength = "2" maxlength = "4" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Bairro:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['bairro_logradouro_empresa'] ?>"
                                               name = "bairro" placeholder = "Digite o bairro" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Cidade:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['cidade_logradouro_empresa'] ?>"
                                               name = "cidade" placeholder = "Digite a cidade" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-1">
                                        <label>Estado:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['uf_logradouro_empresa'] ?>"
                                               name = "estado" id = "estado" placeholder = "UF" required = "true" minlength = "2" maxlength = "2" pattern = "[a-zA-Z\s]+$" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2">
                                        <label>Usuário:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $empresa[0]['usuario_login_empresa'] ?>"
                                               name = "usuario" placeholder = "Usuário para login" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Senha:</label>
                                        <input type = "password" class = "form-control" value = "<?php echo $empresa[0]['senha_login_empresa'] ?>"
                                               name = "senha" placeholder = "Senha para login" required = "true" minlength = "8" maxlength = "50" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2 button-cadastrar-limpar">
                                        <input type = "submit" value = "Atualizar" name = "atualizar" class = "btn btn-tumblr form-control">
                                    </div>
                                    <div class = "col-md-2 button-cadastrar-limpar">
                                        <a href = "empresa_listar.php"><input type = "button" value = "Cancelar" class = "btn btn-linkedin form-control"></a>
                                    </div>
                                </div>
                                <h1>
                                    <?php
                                    include_once ('../controller/empresaCTL.php');
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
                    <?php
                } else {
                    ?>
                    <section class="content-header">
                        <form action="../controller/empresaCTL.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome:</label>
                                        <input required="true" type="text"
                                               name="nome" class="form-control" placeholder="Digite o nome" minlength="10" maxlength="100" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>Nome Fantasia:</label>
                                        <input required="true" type="text"
                                               name="nomef" class="form-control" placeholder="Digite o nome fantasia" minlength="10" maxlength="100" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>CNPJ:</label>
                                        <input type="text" class="form-control"
                                               name="cnpj" id="cnpj" placeholder="99.999.999/9999-99" required="true" minlength="18" maxlength="18" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Inscrição Estadual:</label>
                                        <input type="text" class="form-control"
                                               name="ie" id="ie" placeholder="999999999" required="true" minlength="7" maxlength="11" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class="col-md-3">
                                        <label>Cód. Reg. Tributário (CRT):</label>
                                        <select class="form-control" name="crt">
                                            <option value='1'>1 - Simples Nacional</option>
                                            <option value='2'>2 - Simples Nacional, excesso de sublimite da receita bruta</option>
                                            <option value='3'>3 - Regime Normal</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>E-mail:</label>
                                        <input type="email" id="email" class="form-control"
                                               name="email" placeholder="exemplo@email.com" required="true" minlength="12" maxlength="100" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Telefone:</label>
                                        <input type = "tel" class = "form-control"
                                               name = "telefone" id = "telefone" placeholder = "(99)9999-9999" required = "true" minlength = "13" maxlength = "13" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Status:</label>
                                        <select id="cbStatus" class="form-control" name="status">
                                            <option value='Ativo'>Ativo</option>
                                            <option value='Inativo'>Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2">
                                        <label>CEP:</label>
                                        <input type = "text" class = "form-control"
                                               name = "cep" id = "cep" placeholder = "99999-999" required = "true" minlength = "9" maxlength = "9" />
                                    </div>
                                    <div class = "col-md-3">
                                        <label>Logradouro:</label>
                                        <input type = "text" class = "form-control"
                                               name = "logradouro" placeholder = "Digite a Rua ou Avenida" required = "true" minlength = "5" maxlength = "100" />
                                    </div>
                                    <div class = "col-md-3">
                                        <label>Complemento:</label>
                                        <input type = "text" class = "form-control"
                                               name = "complemento" placeholder = "Digite o complemento" minlength = "2" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-1">
                                        <label>Número:</label>
                                        <input type = "text" class = "form-control"
                                               name = "numero" id = "numero" placeholder = "9999" required = "true" minlength = "2" maxlength = "4" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Bairro:</label>
                                        <input type = "text" class = "form-control"
                                               name = "bairro" placeholder = "Digite o bairro" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Cidade:</label>
                                        <input type = "text" class = "form-control"
                                               name = "cidade" placeholder = "Digite a cidade" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-1">
                                        <label>Estado:</label>
                                        <input type = "text" class = "form-control"
                                               name = "estado" id = "estado" placeholder = "UF" required = "true" minlength = "2" maxlength = "2" pattern = "[a-zA-Z\s]+$" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2">
                                        <label>Usuário:</label>
                                        <input type = "text" class = "form-control"
                                               name = "usuario" placeholder = "Usuário para login" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Senha:</label>
                                        <input type = "password" class = "form-control"
                                               name = "senha" placeholder = "Senha para login" required = "true" minlength = "8" maxlength = "50" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2 button-cadastrar-limpar">
                                        <input type="submit" value="Cadastrar" name="gravar" class="btn btn-success form-control" />
                                    </div>
                                    <div class="col-md-2 button-cadastrar-limpar">
                                        <input type="reset" value="Limpar" class="btn btn-linkedin form-control">
                                    </div>
                                    <div class = "col-md-2 button-cadastrar-limpar">
                                        <a href = "empresa_listar.php"><input type = "button" value = "Cancelar" class = "btn btn-dropbox form-control"></a>
                                    </div>
                                </div>
                                <h1>
                                    <?php
                                    include_once ('../controller/empresaCTL.php');
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
                    <?php
                }
                ?>
            </div>
            <?php
            include_once './footer.php';
            ?>
        </div>
    </body>
</html>
