<?php

function excluirNFe($cNF_nfe) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("delete from nfe where cnf_nfe = " . $cNF_nfe);
    $stmt->execute();
}

function buscarCNPJempresaContadorNFe($cnpj_cont) {
    include_once('../controller/conexao.php');

    $conn = conexao();
    $stmt = $conn->prepare("select e.nome_empresa, e.cnpj_empresa from nfe n, empresa e, item_contador_empresa ice 
        where n.cnpj_empresa = e.cnpj_empresa 
        and e.cnpj_empresa = ice.cnpj_empresa
        and ice.cnpj_cont = '" . $cnpj_cont . "' GROUP BY e.cnpj_empresa;");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>