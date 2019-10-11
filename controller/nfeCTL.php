<?php

if (isset($_POST['gravar'])) {
    include '../controller/conexao.php';
    include '../model/nfe.php';
    include '../model/empresa.php';

    $nNF_nfe = $_POST['cnpje'];
    $cnpj_emp_nfe = $_POST['cnpjEmpresa'];
    $cNF_nfe = $_POST['codigoNFe'];
    $dhEmi_nfe = $_POST['dataEmissaoNfe'];
    $tp_nfe = $_POST['tipoNfe'];
    $natOp_nfe = $_POST['natOperacaoNfe'];
    $arq_nfe = $_POST['arquivoNfe'];

    if (empty($cNF_nfe)) {
        $msg = 'Código não informado! Verifique-o, por gentileza.';
        header('location: ../view/nfe_cadastrar.php?mensagem=' . $msg);
    } else {
        $verificarCodigoNfe = verificarCodigoNfe($cNF_nfe);

        if (count($verificarCodigoNfe) > 0) {
            $msg = 'O Código informado já foi cadastrado! Verifique-o, por gentileza.';
            header('location: ../view/nfe_cadastrar.php?mensagem=' . $msg);
        } else {
            $conn = conexao();
            $sql = "INSERT INTO lorem ipsum";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $nNF_nfe);
            $stmt->bindParam(2, $cnpj_emp_nfe);
            $stmt->bindParam(3, $cNF_nfe);
            $stmt->bindParam(4, $dhEmi_nfe);
            $stmt->bindParam(5, $tp_nfe);
            $stmt->bindParam(6, $natOp_nfe);
            $stmt->bindParam(7, $arq_nfe);
        }
    }
}

function verificarCodigoNfe($cNF_nfe) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("select * from nfe  where cNF_nfe = '" . $cNF_nfe . "';");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function excluirNfe($cNF_nfe) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("delete from nfe where cNF_nfe = '" . $cNF_nfe . "';");
}
?>