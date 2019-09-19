<?php

class contador{
    var $cnpj_empresa;
    var $cnpj_cont_empresa;
    var $crt_empresa;
    var $ie_empresa;
    var $nome_empresa;
    var $nome_fantasia_empresa;
    var $cep_empresa;
    var $logradouro_empresa;
    var $complemento_logradouro_empresa;
    var $numero_logradouro_empresa;
    var $bairro_logradouro_empresa;
    var $cidade_logradouro_empresa;
    var $uf_logradouro_empresa;
    var $telefone_empresa;
    var $email_empresa;
    var $usuario_login_empresa;
    var $senha_login_empresa;
    var $status_empresa;
    var $data_integracao_empresa;
    var $tipo_usuario_empresa;
    
    function getCnpj_empresa() {
        return $this->cnpj_empresa;
    }

    function getCnpj_cont_empresa() {
        return $this->cnpj_cont_empresa;
    }

    function getCrt_empresa() {
        return $this->crt_empresa;
    }

    function getIe_empresa() {
        return $this->ie_empresa;
    }

    function getNome_empresa() {
        return $this->nome_empresa;
    }

    function getNome_fantasia_empresa() {
        return $this->nome_fantasia_empresa;
    }

    function getCep_empresa() {
        return $this->cep_empresa;
    }

    function getLogradouro_empresa() {
        return $this->logradouro_empresa;
    }

    function getComplemento_logradouro_empresa() {
        return $this->complemento_logradouro_empresa;
    }

    function getNumero_logradouro_empresa() {
        return $this->numero_logradouro_empresa;
    }

    function getBairro_logradouro_empresa() {
        return $this->bairro_logradouro_empresa;
    }

    function getCidade_logradouro_empresa() {
        return $this->cidade_logradouro_empresa;
    }

    function getUf_logradouro_empresa() {
        return $this->uf_logradouro_empresa;
    }

    function getTelefone_empresa() {
        return $this->telefone_empresa;
    }

    function getEmail_empresa() {
        return $this->email_empresa;
    }

    function getUsuario_login_empresa() {
        return $this->usuario_login_empresa;
    }

    function getSenha_login_empresa() {
        return $this->senha_login_empresa;
    }

    function getStatus_empresa() {
        return $this->status_empresa;
    }

    function getData_integracao_empresa() {
        return $this->data_integracao_empresa;
    }

    function getTipo_usuario_empresa() {
        return $this->tipo_usuario_empresa;
    }

    function setCnpj_empresa($cnpj_empresa) {
        $this->cnpj_empresa = $cnpj_empresa;
    }

    function setCnpj_cont_empresa($cnpj_cont_empresa) {
        $this->cnpj_cont_empresa = $cnpj_cont_empresa;
    }

    function setCrt_empresa($crt_empresa) {
        $this->crt_empresa = $crt_empresa;
    }

    function setIe_empresa($ie_empresa) {
        $this->ie_empresa = $ie_empresa;
    }

    function setNome_empresa($nome_empresa) {
        $this->nome_empresa = $nome_empresa;
    }

    function setNome_fantasia_empresa($nome_fantasia_empresa) {
        $this->nome_fantasia_empresa = $nome_fantasia_empresa;
    }

    function setCep_empresa($cep_empresa) {
        $this->cep_empresa = $cep_empresa;
    }

    function setLogradouro_empresa($logradouro_empresa) {
        $this->logradouro_empresa = $logradouro_empresa;
    }

    function setComplemento_logradouro_empresa($complemento_logradouro_empresa) {
        $this->complemento_logradouro_empresa = $complemento_logradouro_empresa;
    }

    function setNumero_logradouro_empresa($numero_logradouro_empresa) {
        $this->numero_logradouro_empresa = $numero_logradouro_empresa;
    }

    function setBairro_logradouro_empresa($bairro_logradouro_empresa) {
        $this->bairro_logradouro_empresa = $bairro_logradouro_empresa;
    }

    function setCidade_logradouro_empresa($cidade_logradouro_empresa) {
        $this->cidade_logradouro_empresa = $cidade_logradouro_empresa;
    }

    function setUf_logradouro_empresa($uf_logradouro_empresa) {
        $this->uf_logradouro_empresa = $uf_logradouro_empresa;
    }

    function setTelefone_empresa($telefone_empresa) {
        $this->telefone_empresa = $telefone_empresa;
    }

    function setEmail_empresa($email_empresa) {
        $this->email_empresa = $email_empresa;
    }

    function setUsuario_login_empresa($usuario_login_empresa) {
        $this->usuario_login_empresa = $usuario_login_empresa;
    }

    function setSenha_login_empresa($senha_login_empresa) {
        $this->senha_login_empresa = $senha_login_empresa;
    }

    function setStatus_empresa($status_empresa) {
        $this->status_empresa = $status_empresa;
    }

    function setData_integracao_empresa($data_integracao_empresa) {
        $this->data_integracao_empresa = $data_integracao_empresa;
    }

    function setTipo_usuario_empresa($tipo_usuario_empresa) {
        $this->tipo_usuario_empresa = $tipo_usuario_empresa;
    }

    function __construct($cnpj_empresa, $cnpj_cont_empresa, $crt_empresa, $ie_empresa, 
            $nome_empresa, $nome_fantasia_empresa, $cep_empresa, $logradouro_empresa, 
            $complemento_logradouro_empresa, $numero_logradouro_empresa, $bairro_logradouro_empresa, 
            $cidade_logradouro_empresa, $uf_logradouro_empresa, $telefone_empresa, $email_empresa, 
            $usuario_login_empresa, $senha_login_empresa, $status_empresa, $data_integracao_empresa, 
            $tipo_usuario_empresa) {
        $this->cnpj_empresa = $cnpj_empresa;
        $this->cnpj_cont_empresa = $cnpj_cont_empresa;
        $this->crt_empresa = $crt_empresa;
        $this->ie_empresa = $ie_empresa;
        $this->nome_empresa = $nome_empresa;
        $this->nome_fantasia_empresa = $nome_fantasia_empresa;
        $this->cep_empresa = $cep_empresa;
        $this->logradouro_empresa = $logradouro_empresa;
        $this->complemento_logradouro_empresa = $complemento_logradouro_empresa;
        $this->numero_logradouro_empresa = $numero_logradouro_empresa;
        $this->bairro_logradouro_empresa = $bairro_logradouro_empresa;
        $this->cidade_logradouro_empresa = $cidade_logradouro_empresa;
        $this->uf_logradouro_empresa = $uf_logradouro_empresa;
        $this->telefone_empresa = $telefone_empresa;
        $this->email_empresa = $email_empresa;
        $this->usuario_login_empresa = $usuario_login_empresa;
        $this->senha_login_empresa = $senha_login_empresa;
        $this->status_empresa = $status_empresa;
        $this->data_integracao_empresa = $data_integracao_empresa;
        $this->tipo_usuario_empresa = $tipo_usuario_empresa;
    }
}
?>