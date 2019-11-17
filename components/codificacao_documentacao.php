<?php

// ========== FUNÇÃO SIMPLEXML_LOAD_FILE ==========

$xml = simplexml_load_file($_FILES['notas']['tmp_name'][$i]);
// criação da variável $xml que recebe a função simplexml_load_file
// a função lê o vetor de notas selecionadas no formulário com os arquivos XML 
// a função recebe um objeto com as informações e o caminho de cada nota
// $i é a variável que realiza a identificação de cada nota de acordo com a...
// ...quantidade total de notas que o vetor possui
// ex.: $i = 2 (nota) de 10 (total de notas)
// ========== LAÇO DE REPETIÇÃO FOREACH ==========

foreach ($xml->NFe as $NFe) {
    foreach ($xml->NFe->infNFe as $infNFe) {
        foreach ($xml->NFe->infNFe->ide as $ide) {
            $codigoNF = $ide->cNF;
            $tipoNF = $ide->tpNF;
        }
    }
}
// utiliza-se o laço de repetição foreach para percorrer o objeto ($xml)
// seleciona os dados específicos do conteúdo do arquivo XML da NF-e
// armazena os dados referidos em variáveis para que sejam gravados no BD
// ex.: $codigoNF recebe o valor da tag cNF do arquivo XML
// ========== DOWNLOAD E COMPACTAÇÃO DE ARQUIVO ==========
// inicia a classe ZipArchive
$zip = new ZipArchive();
// define o nome do arquivo compactado
$filename = 'NF-e_' . date('Y-m-d') . "_" . date('h-i-s') . '.zip';
// tenta realizar a criação do arquivo compactado e abri-lo
if ($zip->open($filename, ZipArchive::CREATE) !== true) {
    // caso o arquivo não seja criado a operação é encerrada
    exit("cannot open <$filename>\n");
}
// laço de repetição que adiciona cada arquivo XML dentro do arquivo compactado
while ($linha = pg_fetch_object($query)) {
    $sql = pg_query('select arq_nfe from nfe where cnf_nfe =' . $linha->cnf_nfe);
    $conteudo = pg_result($sql, 0, "arq_nfe");
    // função da classe ZipArchive que salva cada arquivo e seu contaúdo
    $zip->addFromString('NFe_' . $linha->cnf_nfe . '.xml', $conteudo);
}
// após adiconar os arquivos XML, fecha o arquivo compactado
$zip->close();
// funções e parâmetros que realizam o download no navegador
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filename);

// ========== COMANDO DE INSERÇÃO BD ==========
//INSERT INTO nfe(cnf_nfe, cnpj_empresa, natop_nfe, nnf_nfe, dhemi_nfe, tp_nfe, 
//				nome_emit_nfe, nome_dest_nfe, nome_prod_nfe, arq_nfe) 
//	VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 
//			XMLPARSE(DOCUMENT convert_from(pg_read_binary_file(?), 'UTF8')));
//-- comando de inserção dos dados na tabela nfe no banco de dados
//-- cada '?' corresponde ao respectivo valor de cada campo da tabela, de forma sequencial
//-- ex.: o 3º '?' refere-se ao campo natop_nfe (3º campo da tabela)
//-- para a inserção do conteúdo do arquivo XML no seu campo específico utiliza-se...
//-- ...principalmente, as funções xmlparse e pg_read_binary_file, responsáveis por...
//-- ...respectivamente analisar se o arquivo é XML e retornar o conteúdo do arquivo
// ========== CLASSE FPDF ==========

// inicia a classe FPDF
$pdf = new FPDF();
// define o título do documento e da página do navegador
$pdf->SetTitle('Protótipo DANFe');
// adiciona uma nova página no documento PDF
$pdf->AddPage();
// define o tipo, o estilo e o tamanho da fonte
$pdf->SetFont('Courier', 'B', 10);
// define a cor de fundo do documento PDF
$pdf->SetFillColor(255, 255, 255);
// define a cor do texto do documento PDF
$pdf->SetTextColor(0);
// define a largura das bordas
$pdf->SetLineWidth(.1);
// define o conteúdo a ser impresso no documento e suas características
$pdf->MultiCell(0, 7, 'Protótipo DANFe', 0, 'C', false);
// gera o documento PDF na página definida, no navegador
$pdf->Output("DANFe.pdf", "I");

?>