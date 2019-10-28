<?php

if (isset($_REQUEST['acao'])) {
    if ($_REQUEST['acao'] == "gerar") {

        require('../components/fpdf/fpdf.php');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetTitle('Exemplo exibição DANFe');

//Set font and colors
        $pdf->SetFont('Courier', 'B', 10);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0);
        $pdf->SetLineWidth(.1);
        $pdf->SetXY(5, 5);

//Table header
        $pdf->MultiCell(0, 7, 'DANFE', 0, 1, 'C', 1);
        $pdf->SetFont('Courier', '', 9);
        $pdf->MultiCell(0, 7, 'DOCUMENTO AUXILIAR DA NOTA FISCAL ELETRÔNICA', 0, 1, 'L', 1);
        $pdf->Ln(1);

//Restore font and colors
//    $pdf->SetFillColor(224, 235, 255);
//    $pdf->SetTextColor(0);
//Connection and query
        $str_conexao = 'dbname=dbREMANFe port=5432 user=postgres password=postdba';
        $conexao = pg_connect($str_conexao) or die('A conexão ao banco de dados falhou!');
        $consulta = pg_exec($conexao, 'select cnf_nfe, cnpj_empresa, natop_nfe, nnf_nfe, dhemi_nfe, '
                . 'tp_nfe, nome_emit_nfe, nome_dest_nfe, nome_prod_nfe from nfe where cnf_nfe=' . $_REQUEST['codigo']);
        $numregs = pg_numrows($consulta);

//Build table
        $fill = false;
        $i = 0;

        while ($i < $numregs) {
            // CNF
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'CÓDIGO NF-e', 'TBL', 0, 'L', 1);
            $cnf_nfe = pg_result($consulta, $i, 'cnf_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $cnf_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // CNPJ
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'CNPJ', 'TBL', 0, 'L', 1);
            $cnpj_empresa = pg_result($consulta, $i, 'cnpj_empresa');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $cnpj_empresa, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // NATOP
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NATUREZA DE OPERAÇÃO', 'TBL', 0, 'L', 1);
            $natop_nfe = pg_result($consulta, $i, 'natop_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $natop_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // NNF
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NÚMERO NF-e', 'TBL', 0, 'L', 1);
            $nnf_nfe = pg_result($consulta, $i, 'nnf_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nnf_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // DHEMI
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'DATA DE EMISSÃO', 'TBL', 0, 'L', 1);
            $dhemi_nfe = pg_result($consulta, $i, 'dhemi_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $dhemi_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // TP
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'TIPO NF-e', 'TBL', 0, 'L', 1);
            $tp_nfe = pg_result($consulta, $i, 'tp_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $tp_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // EMIT
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO EMITENTE', 'TBL', 0, 'L', 1);
            $nome_emit_nfe = pg_result($consulta, $i, 'nome_emit_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_emit_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // DEST
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO DESTINATÁRIO', 'TBL', 0, 'L', 1);
            $nome_dest_nfe = pg_result($consulta, $i, 'nome_dest_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_dest_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // PROD
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO PRODUTO', 'TBL', 0, 'L', 1);
            $nome_prod_nfe = pg_result($consulta, $i, 'nome_prod_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_prod_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);

            $fill = !$fill;
            $i++;
        }

//Add a rectangle, a line, a logo and some text
//    $pdf->Rect(5, 5, 200, 285);
//    $pdf->SetFont('Arial', 'B', 8);
//    $pdf->SetXY(25, 95);
//    $pdf->Cell(200, 5, 'PDF gerado via PHP acessando banco de dados', 1, 1, 'C', 1);

        $pdf->Output("DANFe_" . $_REQUEST['codigo'] . ".pdf", "I");
    }
}

if (isset($_POST['gerartodasEmpresa'])) {
    require('../components/fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->SetTitle('Exemplo exibição DANFe');

//Set font and colors
    $pdf->SetFont('Courier', 'B', 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0);
    $pdf->SetLineWidth(.1);
    $pdf->SetXY(5, 5);

//Restore font and colors
//    $pdf->SetFillColor(224, 235, 255);
//    $pdf->SetTextColor(0);
//Connection and query
    $str_conexao = 'dbname=dbREMANFe port=5432 user=postgres password=postdba';
    $conexao = pg_connect($str_conexao) or die('A conexão ao banco de dados falhou!');
    $consulta = pg_exec($conexao, "select cnf_nfe, cnpj_empresa, natop_nfe, nnf_nfe, dhemi_nfe, "
            . "tp_nfe, nome_emit_nfe, nome_dest_nfe, nome_prod_nfe from nfe "
            . "where nome_dest_nfe iLIKE '%" . $_POST['nome'] . "%' "
            . "and dhemi_nfe between '" . $_POST['dataini'] . "' and '" . $_POST['datafim'] . "'");
    $numregs = pg_numrows($consulta);

//Build table
    $fill = false;
    $i = 0;

    if ($numregs <= 0) {
        $pdf->AddPage();
        //Table header
        $pdf->SetFont('Courier', 'B', 10);
        $pdf->MultiCell(0, 7, 'Nenhuma DANFe gerada! Não foram encontradas NF-e entre o período selecionado.', 0, 1, 'C', 1);
    } else {
        while ($i < $numregs) {
            $pdf->AddPage();
            //Table header
            $pdf->SetFont('Courier', 'B', 10);
            $pdf->MultiCell(0, 7, 'DANFE', 0, 1, 'C', 1);
            $pdf->SetFont('Courier', '', 9);
            $pdf->MultiCell(0, 7, 'DOCUMENTO AUXILIAR DA NOTA FISCAL ELETRÔNICA', 0, 1, 'L', 1);
            $pdf->Ln(1);
            // CNF
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'CÓDIGO NF-e', 'TBL', 0, 'L', 1);
            $cnf_nfe = pg_result($consulta, $i, 'cnf_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $cnf_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // CNPJ
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'CNPJ', 'TBL', 0, 'L', 1);
            $cnpj_empresa = pg_result($consulta, $i, 'cnpj_empresa');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $cnpj_empresa, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // NATOP
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NATUREZA DE OPERAÇÃO', 'TBL', 0, 'L', 1);
            $natop_nfe = pg_result($consulta, $i, 'natop_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $natop_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // NNF
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NÚMERO NF-e', 'TBL', 0, 'L', 1);
            $nnf_nfe = pg_result($consulta, $i, 'nnf_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nnf_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // DHEMI
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'DATA DE EMISSÃO', 'TBL', 0, 'L', 1);
            $dhemi_nfe = pg_result($consulta, $i, 'dhemi_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $dhemi_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // TP
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'TIPO NF-e', 'TBL', 0, 'L', 1);
            $tp_nfe = pg_result($consulta, $i, 'tp_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $tp_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // EMIT
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO EMITENTE', 'TBL', 0, 'L', 1);
            $nome_emit_nfe = pg_result($consulta, $i, 'nome_emit_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_emit_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // DEST
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO DESTINATÁRIO', 'TBL', 0, 'L', 1);
            $nome_dest_nfe = pg_result($consulta, $i, 'nome_dest_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_dest_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // PROD
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO PRODUTO', 'TBL', 0, 'L', 1);
            $nome_prod_nfe = pg_result($consulta, $i, 'nome_prod_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_prod_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);

            $fill = !$fill;
            $i++;
        }
    }

//Add a rectangle, a line, a logo and some text
//    $pdf->Rect(5, 5, 200, 285);
//    $pdf->SetFont('Arial', 'B', 8);
//    $pdf->SetXY(25, 95);
//    $pdf->Cell(200, 5, 'PDF gerado via PHP acessando banco de dados', 1, 1, 'C', 1);

    $pdf->Output("DANFe.pdf", "I");
} else if (isset($_POST['gerartodasCont'])) {
    require('../components/fpdf/fpdf.php');

    $pdf = new FPDF();
    $pdf->SetTitle('Exemplo exibição DANFe');

//Set font and colors
    $pdf->SetFont('Courier', 'B', 10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0);
    $pdf->SetLineWidth(.1);
    $pdf->SetXY(5, 5);

//Restore font and colors
//    $pdf->SetFillColor(224, 235, 255);
//    $pdf->SetTextColor(0);
//Connection and query
    $str_conexao = 'dbname=dbREMANFe port=5432 user=postgres password=postdba';
    $conexao = pg_connect($str_conexao) or die('A conexão ao banco de dados falhou!');
    $consulta = pg_exec($conexao, "select cnf_nfe, cnpj_empresa, natop_nfe, nnf_nfe, dhemi_nfe, "
            . "tp_nfe, nome_emit_nfe, nome_dest_nfe, nome_prod_nfe from nfe "
            . "where cnpj_empresa = '" . $_POST['empresa'] . "' "
            . "and dhemi_nfe between '" . $_POST['dataini'] . "' and '" . $_POST['datafim'] . "'");
    $numregs = pg_numrows($consulta);

//Build table
    $fill = false;
    $i = 0;
    if ($numregs <= 0) {
        $pdf->AddPage();
        //Table header
        $pdf->SetFont('Courier', 'B', 10);
        $pdf->MultiCell(0, 7, 'Nenhuma DANFe gerada! Não foram encontradas NF-e entre o período selecionado.', 0, 1, 'C', 1);
    } else {
        while ($i < $numregs) {
            $pdf->AddPage();
            //Table header
            $pdf->SetFont('Courier', 'B', 10);
            $pdf->MultiCell(0, 7, 'DANFE', 0, 1, 'C', 1);
            $pdf->SetFont('Courier', '', 9);
            $pdf->MultiCell(0, 7, 'DOCUMENTO AUXILIAR DA NOTA FISCAL ELETRÔNICA', 0, 1, 'L', 1);
            $pdf->Ln(1);
            // CNF
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'CÓDIGO NF-e', 'TBL', 0, 'L', 1);
            $cnf_nfe = pg_result($consulta, $i, 'cnf_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $cnf_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // CNPJ
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'CNPJ', 'TBL', 0, 'L', 1);
            $cnpj_empresa = pg_result($consulta, $i, 'cnpj_empresa');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $cnpj_empresa, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // NATOP
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NATUREZA DE OPERAÇÃO', 'TBL', 0, 'L', 1);
            $natop_nfe = pg_result($consulta, $i, 'natop_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $natop_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // NNF
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NÚMERO NF-e', 'TBL', 0, 'L', 1);
            $nnf_nfe = pg_result($consulta, $i, 'nnf_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nnf_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // DHEMI
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'DATA DE EMISSÃO', 'TBL', 0, 'L', 1);
            $dhemi_nfe = pg_result($consulta, $i, 'dhemi_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $dhemi_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // TP
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'TIPO NF-e', 'TBL', 0, 'L', 1);
            $tp_nfe = pg_result($consulta, $i, 'tp_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $tp_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // EMIT
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO EMITENTE', 'TBL', 0, 'L', 1);
            $nome_emit_nfe = pg_result($consulta, $i, 'nome_emit_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_emit_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // DEST
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO DESTINATÁRIO', 'TBL', 0, 'L', 1);
            $nome_dest_nfe = pg_result($consulta, $i, 'nome_dest_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_dest_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);
            // PROD
            $pdf->SetFont('Courier', 'B', 8);
            $pdf->Cell(50, 7, 'NOME DO PRODUTO', 'TBL', 0, 'L', 1);
            $nome_prod_nfe = pg_result($consulta, $i, 'nome_prod_nfe');
            $pdf->SetFont('Courier', '', 9);
            $pdf->Cell(0, 7, $nome_prod_nfe, 'TRB', 0, 'L');
            $pdf->Ln(8);

            $fill = !$fill;
            $i++;
        }

//Add a rectangle, a line, a logo and some text
//    $pdf->Rect(5, 5, 200, 285);
//    $pdf->SetFont('Arial', 'B', 8);
//    $pdf->SetXY(25, 95);
//    $pdf->Cell(200, 5, 'PDF gerado via PHP acessando banco de dados', 1, 1, 'C', 1);

        $pdf->Output("DANFe_" . $_POST['empresa'] . ".pdf", "I");
    }
}
?>