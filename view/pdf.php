<?php

include_once ('../controller/conexao.php');
$conn1 = conexao();

$html = '<table border=1';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>NÃºmero NFE</th>';
$html .= '<th>CNPJ Empresa</th>';
$html .= '<th>Natureza OperaÃ§Ã£o</th>';
$html .= '<th>Tipo de NFE</th>';
$html .= '<th>Nome DestinatÃ¡rio</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';



$result_transacoes = "SELECT * FROM nfe";
$resultado_trasacoes = pg_query($conn1, $result_transacoes);
while ($row_transacoes = pg_fetch_assoc($resultado_trasacoes)) {
    $html .= '<tr><td>' . $resultado_trasacoes['cnf_nfe'] . "</td>";
    $html .= '<td>' . $resultado_trasacoes['cnpj_empresa'] . "</td>";
    $html .= '<td>' . $resultado_trasacoes['natop_nfe'] . "</td>";
    $html .= '<td>' . $resultado_trasacoes['tp_nfe'] . "</td>";
    $html .= '<td>' . $resultado_trasacoes['nome_dest_nfe'] . "</td></tr>";
}

$html .= '</tbody>';
$html .= '</table';

//// include autoloader
//require_once ('../components/dompdf/autoload.inc.php');
//
////referenciar o DomPDF com namespace
//use Dompdf\Dompdf;
//
////Criando a Instancia
//$dompdf = new DOMPDF();
//
//// Carrega seu HTML
//$dompdf->load_html('
//			<h1 style="text-align: center;">Celke - Relatório de Transações</h1>
////					');
//
////Renderizar o html
//$dompdf->render();
//
////Exibibir a página
//$dompdf->stream(
//        "relatorio_celke.pdf", array(
//    "Attachment" => false //Para realizar o download somente alterar para true
//        )
//);

require_once ('../components/dompdf/autoload.inc.php');

// referenciando o namespace do dompdf

use Dompdf\Dompdf;

// instanciando o dompdf

$dompdf = new Dompdf();

//lendo o arquivo HTML correspondente

$html = file_get_contents('./p');

//inserindo o HTML que queremos converter

$dompdf->loadHtml($html);

// Definindo o papel e a orientação

$dompdf->setPaper('A4', 'landscape');

// Renderizando o HTML como PDF

$dompdf->render();

// Enviando o PDF para o browser

$dompdf->stream();

?>

