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
<!--        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>-->
        <!-- Webservice CEP -->
        <script type="text/javascript" >

            $(document).ready(function () {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $("#logradouro").val("");
                    $("#bairro").val("");
                    $("#cidade").val("");
                    $("#estado").val("");
                }

                //Quando o campo cep perde o foco.
                $("#cep").blur(function () {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if (validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $("#logradouro").val("...");
                            $("#bairro").val("...");
                            $("#cidade").val("...");
                            $("#estado").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $("#logradouro").val(dados.logradouro);
                                    $("#bairro").val(dados.bairro);
                                    $("#cidade").val(dados.localidade);
                                    $("#estado").val(dados.uf);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });

        </script>

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
                        <small>Administrador</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <?php
                        include_once '../controller/adminCTL.php';
                        if (isset($_REQUEST['cpf'])) {
                            $admin = verificarCPF($_REQUEST['cpf']);
                            ?>
                            <li class="active">Atualizar Administrador</li>
                            <?php
                        } else {
                            ?>
                            <li class="active">Cadastrar Administrador</li>
                            <?php
                        }
                        ?>
                    </ol>
                </section>

                <?php
                include_once '../controller/adminCTL.php';
                if (isset($_REQUEST['cpf'])) {
                    $admin = verificarCPF($_REQUEST['cpf']);
                    ?>
                    <section class="content-header">
                        <form action="../controller/adminCTL.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome:</label>
                                        <input required="true" type="text" value="<?php echo $admin[0]['nome_admin'] ?>" 
                                               name="nome" class="form-control" placeholder="Digite o nome" minlength="10" maxlength="100" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>CPF:</label>
                                        <input type="text" class="form-control" value="<?php echo $admin[0]['cpf_admin'] ?>" 
                                               name="cpf" id="cpf" placeholder="999.999.999-99" required="true" minlength="14" maxlength="14" readonly="true" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>E-mail:</label>
                                        <input type="email" id="email" class="form-control" value="<?php echo $admin[0]['email_admin'] ?>" 
                                               name="email" placeholder="exemplo@email.com" required="true" minlength="12" maxlength="100" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Status:</label>
                                        <select id="cbStatus" class="form-control" name="status">
                                            <?php
                                            if ("Ativo" == $admin[0]['status_admin']) {
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
                                        <label>Celular:</label>
                                        <input type = "tel" class = "form-control" value = "<?php echo $admin[0]['celular_admin'] ?>"
                                               name = "celular" id = "celular" placeholder = "(99)99999-9999" required = "true" minlength = "14" maxlength = "14" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Celular comercial:</label>
                                        <input type = "tel" class = "form-control" value = "<?php echo $admin[0]['celular_comercial_admin'] ?>"
                                               name = "celular_com" id = "celular_com" placeholder = "(99)99999-9999" minlength = "14" maxlength = "14" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2">
                                        <label>CEP:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $admin[0]['cep_admin'] ?>"
                                               name = "cep" id = "cep" placeholder = "99999-999" required = "true" minlength = "9" maxlength = "9" />
                                    </div>
                                    <div class = "col-md-3">
                                        <label>Logradouro:</label>
                                        <input type = "text" id="logradouro" class = "form-control" value = "<?php echo $admin[0]['logradouro_admin'] ?>"
                                               name = "logradouro" placeholder = "Rua ou Avenida" required = "true" minlength = "5" maxlength = "100" readonly="true"/>
                                    </div>
                                    <div class = "col-md-3">
                                        <label>Complemento:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $admin[0]['complemento_logradouro_admin'] ?>"
                                               name = "complemento" placeholder = "Digite o complemento" minlength = "2" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-1">
                                        <label>Número:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $admin[0]['numero_logradouro_admin'] ?>"
                                               name = "numero" id = "numero" placeholder = "9999" required = "true" minlength = "2" maxlength = "4" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Bairro:</label>
                                        <input type = "text" id="bairro" class = "form-control" value = "<?php echo $admin[0]['bairro_logradouro_admin'] ?>"
                                               name = "bairro" placeholder = "Bairro" required = "true" minlength = "5" maxlength = "50" readonly="true"/>
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Cidade:</label>
                                        <input type = "text" id="cidade" class = "form-control" value = "<?php echo $admin[0]['cidade_logradouro_admin'] ?>"
                                               name = "cidade" placeholder = "Cidade" required = "true" minlength = "5" maxlength = "50" readonly="true"/>
                                    </div>
                                    <div class = "col-md-1">
                                        <label>Estado:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $admin[0]['uf_logradouro_admin'] ?>"
                                               name = "estado" id = "estado" placeholder = "UF" required = "true" minlength = "2" maxlength = "2" pattern = "[a-zA-Z\s]+$" readonly="true"/>
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2">
                                        <label>Usuário:</label>
                                        <input type = "text" class = "form-control" value = "<?php echo $admin[0]['usuario_login_admin'] ?>"
                                               name = "usuario" placeholder = "Usuário para login" required = "true" minlength = "5" maxlength = "50" />
                                    </div>
                                    <div class = "col-md-2">
                                        <label>Senha:</label>
                                        <input type = "password" class = "form-control" value = "<?php echo $admin[0]['senha_login_admin'] ?>"
                                               name = "senha" placeholder = "Senha para login" required = "true" minlength = "8" maxlength = "50" />
                                    </div>
                                </div>
                                <div class = "row">
                                    <div class = "col-md-2 button-cadastrar-limpar">
                                        <input type = "submit" value = "Atualizar" name = "atualizar" class = "btn btn-tumblr form-control">
                                    </div>
                                    <div class = "col-md-2 button-cadastrar-limpar">
                                        <a href = "admin_listar.php"><input type = "button" value = "Cancelar" class = "btn btn-linkedin form-control"></a>
                                    </div>
                                </div>
                                <h1>
                                    <?php
                                    include_once ('../controller/adminCTL.php');
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
                        <form action="../controller/adminCTL.php" method="POST" autocomplete="off">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nome:</label>
                                        <input type="text" name="nome" class="form-control" placeholder="Digite o nome" required="true" minlength="10" maxlength="100" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>CPF:</label>
                                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="999.999.999-99" required="true" minlength="14" maxlength="14" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>E-mail:</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="exemplo@email.com" required="true" minlength="12" maxlength="100" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Status:</label>
                                        <select id="cbStatus" name="status" class="form-control">
                                            <option value="Ativo" >Ativo</option>
                                            <option value="Inativo" >Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Celular:</label>
                                        <input type="tel" id="celular" name="celular" class="form-control" placeholder="(99)99999-9999" required="true" minlength="14" maxlength="14" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Celular comercial:</label>
                                        <input type="tel" id="celular_com" name="celular_com" class="form-control" placeholder="(99)99999-9999" minlength="14" maxlength="14" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>CEP:</label>
                                        <input type="text" id="cep" name="cep" class="form-control" placeholder="99999-999" required="true" minlength="9" maxlength="9" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Logradouro:</label>
                                        <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Rua ou Avenida" required="true" minlength="5" maxlength="100" readonly="true"/>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Complemento:</label>
                                        <input type="text" name="complemento" class="form-control" placeholder="Digite o complemento" minlength="2" maxlength="50" />
                                    </div>
                                    <div class="col-md-1">
                                        <label>Número:</label>
                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="9999" required="true" minlength="2" maxlength="4" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Bairro:</label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" required="true" minlength="5" maxlength="50" readonly="true"/>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Cidade:</label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" required="true" minlength="5" maxlength="50" readonly="true"/>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Estado:</label>
                                        <input type="text" id="estado" name="estado" class="form-control" placeholder="UF" required="true" minlength="2" maxlength="2" pattern="[a-zA-Z\s]+$" readonly="true"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label>Usuário:</label>
                                        <input type="text" name="usuario" class="form-control" placeholder="Usuário para login" required="true" minlength="5" maxlength="50" />
                                    </div>
                                    <div class="col-md-2">
                                        <label>Senha:</label>
                                        <input type="password" name="senha" class="form-control" placeholder="Senha para login" required="true" minlength="8" maxlength="50" />
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
                                        <a href = "admin_listar.php"><input type = "button" value = "Cancelar" class = "btn btn-dropbox form-control"></a>
                                    </div>
                                </div>
                                <h1>
                                    <?php
                                    include_once ('../controller/adminCTL.php');
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
