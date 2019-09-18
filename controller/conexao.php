<?php

const DBDRIVER = "pgsql";
const HOSTNAME = "localhost";
const USERNAME = "postgres";
const PASSWORD = "postdba";
const DBNAME = "dbREMANFe";

try {

    function conexao() {
        $conn = new PDO(
                DBDRIVER . ":host=" . HOSTNAME . ";port=5432;dbname=" . DBNAME . ";user=" . USERNAME . ";password=" . PASSWORD
        );

        // Tratamento necessário para que apareçam erros de comando SQL
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        //retorna o canal de conexão com sucesso
        return $conn;
    }

} catch (PDOexception $erro) {
    echo "Ocorreu um erro " . $erro->getMessage();
}
?>