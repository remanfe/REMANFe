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
        <title>REMANFe | Upload NF-e</title>
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
                        Upload
                        <small>NF-e</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../index.php"><i class="fa fa-home"></i>Inicio</a></li>
                        <li class="active">Upload NF-e</li>
                    </ol>
                    <br>
                    <h5>
                        Para realizar o upload de NF-e, escolha o(s) arquivo(s) no formato XML da sua pasta no computador, 
                        clique em "Abrir" e para finalizar clique no botão "Enviar".
                    </h5>
                    <br>
                    <form action="nfe_upload.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="file" name="notas[]" multiple accept="text/xml" class="btn btn-file form-control" />
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="submit" value="Enviar"class="btn btn-primary form-control" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="hidden" value="<?php echo $_SESSION['cnpj_empresa']; ?>" id="cnpj" name="cnpj">
                        </div>
                    </form>
                    <br>

                    <?php
                    if (isset($_POST['submit'])) {
                        include '../controller/conexao.php';

                        // conta quantas notas possuem o vetor de notas a partir do nome de cada uma
                        // pega o nome da útlima nota para validar se foi passado alguma nota no vetor de notas
                        $string_notas = count($_FILES['notas']['name']) - 1;

                        // verifica se o vetor de notas foi enviado por POST, passando a última possível nota enviada
                        // caso não tenha sido enviado nenhum arquivo, é exiba uma mensagem informando o ocorrido 
                        if (is_uploaded_file($_FILES['notas']['tmp_name'][$string_notas])) {

                            // se o "tmp_name" estiver vazio, é porque nenhum arquivo foi enviado
                            // cria uma variável para armazenar toda a informação do vetor de notas
                            $notas = $_FILES['notas'];

                            // conta o total de notas enviadas
                            $total = count($notas['name']);

                            // variáveis para contabilizar os possíveis resultados de sucesso e erro
                            $notas_sucesso = 0;
                            $notas_erro = 0;
                            $notas_vazias = 0;

                            // desabilita os erros da leitura do xml e permite que tratemos-os como necessitarmos
                            libxml_use_internal_errors(true);

                            // utilização do for para realizar a leitura e armazenamento de cada nota por si só no BD
                            for ($i = 0; $i < $total; $i++) {

                                // lê o vetor de notas com os arquivos XML e recebe um objeto com as informações
                                $xml = simplexml_load_file($_FILES['notas']['tmp_name'][$i]);

                                // verifico se foi possível realizar a leitura do conteúdo da nota, confirmando se o arquivo está vazio ou não
                                if (!$xml) {
                                    $notas_vazias++;
                                } else {

                                    // armazeno o nome do arquivo selecionado em uma variável
                                    $nome_arquivo = $_FILES['notas']['name'][$i];

                                    // defino um diretório dentro do projeto, que armazenará as notas antes de gravarmos-as no BD
                                    $diretorio = "uploads/";

                                    // armazena arquivo na pasta uploads para depois ser gravado no banco
                                    move_uploaded_file($_FILES['notas']['tmp_name'][$i], $diretorio . $nome_arquivo);

                                    // define o caminho onde o arquivo será salvo
                                    $path = $_SERVER['DOCUMENT_ROOT'] . '/REMANFe/view/uploads/';

                                    // armazena o caminho absoluto do arquivo em uma variável
                                    // necessário para armazenar o conteúdo completo do arquivo no banco de dados
                                    $content = $path . $nome_arquivo;

                                    // utiliza-se um laço de repetição específico (foreach) para percorrer o objeto
                                    // selecionado os dados específicos necessários para armazenamento no DB
                                    foreach ($xml->NFe as $NFe) {
                                        foreach ($xml->NFe->infNFe as $infNFe) {
                                            foreach ($xml->NFe->infNFe->ide as $ide) {
                                                $codigoNF = $ide->cNF;
                                                $naturezaNF = $ide->natOp;
                                                $numeroNF = $ide->nNF;
                                                $datahoraNF = $ide->dhEmi;
                                                $tipoNF = $ide->tpNF;
                                            }
                                            foreach ($xml->NFe->infNFe->emit as $emit) {
                                                $nomeEmit = $emit->xNome;
                                            }
                                            foreach ($xml->NFe->infNFe->dest as $dest) {
                                                $nomeDest = $dest->xNome;
                                            }
                                            foreach ($xml->NFe->infNFe->det as $det) {
                                                foreach ($xml->NFe->infNFe->det->prod as $prod) {
                                                    $nomeProd = $prod->xProd;
                                                }
                                            }
                                        }
                                    }

                                    // comandos para conexão com o BD, script de inserção e parâmetros necessários
                                    $conn = conexao();
                                    $sql = "INSERT INTO public.nfe(
                                    cnf_nfe, cnpj_empresa, natop_nfe, nnf_nfe, dhemi_nfe, tp_nfe, nome_emit_nfe, nome_dest_nfe, 
                                    nome_prod_nfe, arq_nfe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, XMLPARSE(DOCUMENT convert_from(pg_read_binary_file(?), 'UTF8')));";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->bindParam(1, $codigoNF);
                                    $stmt->bindParam(2, $_SESSION['cnpj_empresa']);
                                    $stmt->bindParam(3, $naturezaNF);
                                    $stmt->bindParam(4, $numeroNF);
                                    $stmt->bindParam(5, $datahoraNF);
                                    $stmt->bindParam(6, $tipoNF);
                                    $stmt->bindParam(7, $nomeEmit);
                                    $stmt->bindParam(8, $nomeDest);
                                    $stmt->bindParam(9, $nomeProd);
                                    $stmt->bindParam(10, $content);

                                    // tenta executar o script no DB
                                    // em caso de sucesso, conta cada sucesso
                                    // em caso de possível erro, conta cada erro para realizar o tratamento específico
                                    // em ambos os casos, a nota armazenada em disco (pasta uploads) é excluída após ser ou não gravada no BD
                                    try {
                                        if ($stmt->execute()) {
                                            $notas_sucesso++;
                                            unlink($content);
                                        }
                                    } catch (PDOException $err) {
                                        $notas_erro++;
                                        echo '<p><b>Alerta:</b> Upload da NF-e <b><i>' . $nome_arquivo . '</i></b> não realizado! O arquivo é inválido ou já foi cadastrado.</p>';
                                        unlink($content);
                                    } catch (Exception $err) {
                                        echo "Erro ao realizar Upload!";
                                    }
                                }
                            }

                            // mensagens informativas sobre a resolução das operações realizadas
                            echo "<p style='color: blue;'><b>Quantidade total de NF-e selecionadas: " . $total . "</b></p>";
                            if ($notas_sucesso > 0) {
                                echo "<p style='color: green;'><b>Quantidade de NF-e enviadas com sucesso: " . $notas_sucesso . "</b></p>";
                            }
                            if ($notas_erro > 0) {
                                echo "<p style='color: red;'><b>Quantidade de NF-e não enviadas: " . $notas_erro . "</b></p>";
                            }
                            if ($notas_vazias > 0) {
                                echo "<p style='color: gray;'><b>Quantidade de arquivos XML vazios: " . $notas_vazias . "</b></p>";
                            }
                        } else {
                            echo '<b>Observação: Nenhum arquivo selecionado! É necessário selecionar um ou mais arquivos XML para que seja realizado o upload.</b>';
                        }
                    }
                    ?>
                </section>
            </div>
            <?php
            include_once './footer.php';
            ?>
        </div>
    </body>
</html>