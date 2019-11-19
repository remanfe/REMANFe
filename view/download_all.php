<?php

session_start();

if (isset($_POST['download'])) {
    $conn = 'dbname=dbREMANFe port=5432 user=postgres password=postdba';
    $conexao = pg_connect($conn) or die('A conexão ao banco de dados falhou!');

    if ($_SESSION['tipo_usuario'] == 1) {
        $script = ("select cnf_nfe from nfe where nome_dest_nfe iLIKE '%" . $_POST['nome'] . "%'"
                . " and cnpj_empresa = '" . $_POST['empresa'] . "' and dhemi_nfe between '" . $_POST['dataini'] . "'"
                . " and '" . $_POST['datafim'] . "' ORDER BY dhemi_nfe;");
    } else if ($_SESSION['tipo_usuario'] == 2) {
        $script = ("select cnf_nfe from nfe where nome_dest_nfe iLIKE '%" . $_POST['nome'] . "%'"
                . " and dhemi_nfe between '" . $_POST['dataini'] . "' and '" . $_POST['datafim']
                . "' and cnpj_empresa = '" . $_SESSION['cnpj_empresa'] . "' ORDER BY dhemi_nfe;");
    }
    $query = pg_query($script);
    $verifica = pg_num_rows($query);
    $msg = '';

    if ($verifica < 1) {
        $msg = 'Não foram encontradas NF-e entre o período especificado para download!'
                . '<br>Tente realizar o download novamente.';
        header('location: nfe_download.php?mensagem=' . $msg);
    } else {
        $zip = new ZipArchive();
        $filename = 'NF-e_' . date('Y-m-d') . "_" . date('h-i-s') . '.zip';
        if ($zip->open($filename, ZipArchive::CREATE) !== true) {
            exit("cannot open <$filename>\n");
        }

        $conn = 'dbname=dbREMANFe port=5432 user=postgres password=postdba';
        $conexao = pg_connect($conn) or die('A conexão ao banco de dados falhou!');

        while ($linha = pg_fetch_object($query)) {
            $sql = pg_query('select arq_nfe from nfe where cnf_nfe =' . $linha->cnf_nfe);
            $conteudo = pg_result($sql, 0, "arq_nfe");

            $zip->addFromString('NFe_' . $linha->cnf_nfe . '.xml', $conteudo);
        }

        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        readfile($filename);
        //remove o arquivo zip após download
        unlink($filename);
    }
}
