<?php

class itemContadorEmpresa{
    var $id_item_contador_empresa;
    var $cnpj_cont_item;
    var $cnpj_empresa_item;
    var $data_integracao_cont_empresa;
    
    function getId_item_contador_empresa() {
        return $this->id_item_contador_empresa;
    }

    function getCnpj_cont_item() {
        return $this->cnpj_cont_item;
    }

    function getCnpj_empresa_item() {
        return $this->cnpj_empresa_item;
    }

    function getData_integracao_cont_empresa() {
        return $this->data_integracao_cont_empresa;
    }

    function setId_item_contador_empresa($id_item_contador_empresa) {
        $this->id_item_contador_empresa = $id_item_contador_empresa;
    }

    function setCnpj_cont_item($cnpj_cont_item) {
        $this->cnpj_cont_item = $cnpj_cont_item;
    }

    function setCnpj_empresa_item($cnpj_empresa_item) {
        $this->cnpj_empresa_item = $cnpj_empresa_item;
    }

    function setData_integracao_cont_empresa($data_integracao_cont_empresa) {
        $this->data_integracao_cont_empresa = $data_integracao_cont_empresa;
    }

    function __construct($id_item_contador_empresa, $cnpj_cont_item, $cnpj_empresa_item, 
            $data_integracao_cont_empresa) {
        $this->id_item_contador_empresa = $id_item_contador_empresa;
        $this->cnpj_cont_item = $cnpj_cont_item;
        $this->cnpj_empresa_item = $cnpj_empresa_item;
        $this->data_integracao_cont_empresa = $data_integracao_cont_empresa;
    }
}
?>