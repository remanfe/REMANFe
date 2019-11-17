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
        <title>REMANFe | Guia de Utilização</title>
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

                    <h4>Página UPLOAD NF-e</h4>
                    <img src="../components/images/guia1.png" class="img_guia">
                    <p>
                        Essa página permite que as empresas cadastradas realizem o upload das NF-e para a base de dados do sistema. 
                    </p>
                    <li>O botão <b>Escolher arquivos</b> deve ser utilizado para selecionar os arquivos XML das NF-e que estão no computador do usuário.</li>
                    <li>O botão <b>Enviar</b> realiza as validações nos arquivos e armazena-os no banco de dados.</li>

                    <hr>

                    <h4>Página LISTAR NF-e</h4>
                    <img src="../components/images/guia2.png" class="img_guia">
                    <p>
                        Essa página permite que os contadores as empresas cadastradas listem em uma tabela as NF-e armazenadas na base de dados do sistema. 
                    </p>
                    <li>O campo <b>Nome do destinatário da NF-e</b> pode ser preenchido para realizar uma busca específica entre as NF-e cadastradas no sistema.</li>
                    <li>Os campos <b>Data de Início</b> e <b>Data Final</b> devem ser preenchidos com as respectivas datas de um período de tempo para que seja realizada a filtragem das NF-e com data de emissão entre o período especificado.</li>
                    <li>O botão <b>Buscar</b> realiza a busca na base de dados de acordo com os dados preenchidos nos campos do formulário e apresenta as NF-e na tabela, com alguns dados específicos de cada arquivo, assim como, dispõe de algumas opções para cada NF-e (Gerar DANFe, Efetuar Download e Excluir NF-e).</li>
                    <li>O botão <b>Upload NF-e</b> redireciona o usuário para a página de Upload de NF-e.</li>

                    <hr>

                    <h4>Página DOWNLOAD NF-e</h4>
                    <img src="../components/images/guia3.png" class="img_guia">
                    <p>
                        Essa página permite que as empresas cadastradas realizem o download das NF-e para a base de dados do sistema.
                    </p>
                    <li>O campo <b>Nome do destinatário da NF-e</b> pode ser preenchido para realizar uma busca específica entre as NF-e cadastradas no sistema.</li>
                    <li>Os campos <b>Data de Início</b> e <b>Data Final</b> devem ser preenchidos com as respectivas datas de um período de tempo para que seja realizada a filtragem das NF-e com data de emissão entre o período especificado.</li>
                    <li>O botão <b>Download</b> é responsável por compactar as NF-e (filtradas com datas de emissão entre o prazo especificado) em um arquivo ZIP e realizar o download no navegador.</li>

                    <hr>
                    
                    <h4>Página GERAR DANFe</h4>
                    <img src="../components/images/guia4.png" class="img_guia">
                    <p>
                        Essa página permite que as empresas cadastradas gerem as DANFe das NF-e armazenadas na base de dados do sistema.
                    </p>
                    <li>O campo <b>Nome do destinatário da NF-e</b> pode ser preenchido para realizar uma busca específica entre as NF-e cadastradas no sistema.</li>
                    <li>Os campos <b>Data de Início</b> e <b>Data Final</b> devem ser preenchidos com as respectivas datas de um período de tempo para que seja realizada a filtragem das NF-e com data de emissão entre o período especificado.</li>
                    <li>O botão <b>Gerar DANFe</b> é responsável por gerar as DANFe das NF-e de acordo com os dados especificados no formulário e abrir uma página no navegador com o arquivo em formato PDF (contendo as DANFe das NF-e filtradas na base de dados) disponível para download e impressão.</li>

                    <br>
                </section>
            </div>
            <?php
            include_once './footer.php';
            ?>
        </div>
    </body>
</html>
