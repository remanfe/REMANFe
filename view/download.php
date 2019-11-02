<?php

// realiza conexão com o BD
$conn = 'dbname=dbREMANFe port=5432 user=postgres password=postdba';
$conexao = pg_connect($conn) or die('A conexão ao banco de dados falhou!');

// realiza consulta SQL
$codigo = $_GET['codigo'];
$sql = pg_query('select arq_nfe from nfe where cnf_nfe =' . $codigo);
$conteudo = pg_result($sql, 0, "arq_nfe");

// realiza download
header('Content-Type: text/xml; charset=utf-8');
header('Content-Disposition: attachment; filename=NFe_' . $_GET["codigo"] . '.xml');
print ($conteudo);
?>