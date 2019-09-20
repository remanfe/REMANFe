<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>REMANFe Login</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="components/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="components/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="components/css/util.css">
        <link rel="stylesheet" type="text/css" href="components/css/main.css">
        <link rel="stylesheet" type="text/css" href="components/css/style.css">
        <link rel="shortcut icon" href="components/images/favicon.png">   
    </head>
    <body class="fundo-gradiente">
        <div class="limiter">
            <div class="container-login100"> <!--style="background-image: url('images/fundo.png')"-->
                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41">
                        REMANF<span style="text-transform: lowercase;">e</span> Login
                    </span>
                    <form action="controller/verifica_login.php" method="POST" autocomplete="off" class="login100-form validate-form p-b-30 p-t-5" name="formLogin" id="formLogin">

                        <div class="wrap-input100 validate-input" data-validate = "Informe o usuário">
                            <input id="usuario" class="input100" type="text" name="usuario" placeholder="Usuário">
                            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Informe a senha">
                            <input id="senha" class="input100" type="password" name="senha" placeholder="Senha">
                            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        </div>

                        <div class="container-login100-form-btn m-t-30">
                            <button type="submit" class="login100-form-btn adjust-button">Login</button>
                        </div>
                        <p class="msg-login">
                            <strong>
                                <?php
                                if (isset($_REQUEST['mensagem'])) {
                                    echo " " . $_REQUEST['mensagem'];
                                }
                                ?>
                            </strong>
                        </p>
                    </form>
                </div>
            </div>
        </div>

        <script src="components/js/jquery/jquery-3.3.1.min.js"></script>
        <script src="components/js/main.js"></script>
    </body>
</html>