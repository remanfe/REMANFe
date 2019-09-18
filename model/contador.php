<?php

class contador{
    var $cnpj_cont;
    var $cpf_admin_cont;
    var $ie_cont;
    var $nome_cont;
    var $nome_fantasia_cont;
    var $cep_cont;
    var $logradouro_cont;
    var $complemento_logradouro_cont;
    var $numero_logradouro_cont;
    var $bairro_logradouro_cont;
    var $cidade_logradouro_cont;
    var $uf_logradouro_cont;
    var $telefone_cont;
    var $email_cont;
    var $usuario_login_cont;
    var $senha_login_cont;
    var $status_cont;
    var $data_integracao_cont;
    var $tipo_usuario_cont;
    
    function getCnpj_cont() {
        return $this->cnpj_cont;
    }

    function getCpf_admin_cont() {
        return $this->cpf_admin_cont;
    }

    function getIe_cont() {
        return $this->ie_cont;
    }

    function getNome_cont() {
        return $this->nome_cont;
    }

    function getNome_fantasia_cont() {
        return $this->nome_fantasia_cont;
    }

    function getCep_cont() {
        return $this->cep_cont;
    }

    function getLogradouro_cont() {
        return $this->logradouro_cont;
    }

    function getComplemento_logradouro_cont() {
        return $this->complemento_logradouro_cont;
    }

    function getNumero_logradouro_cont() {
        return $this->numero_logradouro_cont;
    }

    function getBairro_logradouro_cont() {
        return $this->bairro_logradouro_cont;
    }

    function getCidade_logradouro_cont() {
        return $this->cidade_logradouro_cont;
    }

    function getUf_logradouro_cont() {
        return $this->uf_logradouro_cont;
    }

    function getTelefone_cont() {
        return $this->telefone_cont;
    }

    function getEmail_cont() {
        return $this->email_cont;
    }

    function getUsuario_login_cont() {
        return $this->usuario_login_cont;
    }

    function getSenha_login_cont() {
        return $this->senha_login_cont;
    }

    function getStatus_cont() {
        return $this->status_cont;
    }

    function getData_integracao_cont() {
        return $this->data_integracao_cont;
    }

    function getTipo_usuario_cont() {
        return $this->tipo_usuario_cont;
    }

    function setCnpj_cont($cnpj_cont) {
        $this->cnpj_cont = $cnpj_cont;
    }

    function setCpf_admin_cont($cpf_admin_cont) {
        $this->cpf_admin_cont = $cpf_admin_cont;
    }

    function setIe_cont($ie_cont) {
        $this->ie_cont = $ie_cont;
    }

    function setNome_cont($nome_cont) {
        $this->nome_cont = $nome_cont;
    }

    function setNome_fantasia_cont($nome_fantasia_cont) {
        $this->nome_fantasia_cont = $nome_fantasia_cont;
    }

    function setCep_cont($cep_cont) {
        $this->cep_cont = $cep_cont;
    }

    function setLogradouro_cont($logradouro_cont) {
        $this->logradouro_cont = $logradouro_cont;
    }

    function setComplemento_logradouro_cont($complemento_logradouro_cont) {
        $this->complemento_logradouro_cont = $complemento_logradouro_cont;
    }

    function setNumero_logradouro_cont($numero_logradouro_cont) {
        $this->numero_logradouro_cont = $numero_logradouro_cont;
    }

    function setBairro_logradouro_cont($bairro_logradouro_cont) {
        $this->bairro_logradouro_cont = $bairro_logradouro_cont;
    }

    function setCidade_logradouro_cont($cidade_logradouro_cont) {
        $this->cidade_logradouro_cont = $cidade_logradouro_cont;
    }

    function setUf_logradouro_cont($uf_logradouro_cont) {
        $this->uf_logradouro_cont = $uf_logradouro_cont;
    }

    function setTelefone_cont($telefone_cont) {
        $this->telefone_cont = $telefone_cont;
    }

    function setEmail_cont($email_cont) {
        $this->email_cont = $email_cont;
    }

    function setUsuario_login_cont($usuario_login_cont) {
        $this->usuario_login_cont = $usuario_login_cont;
    }

    function setSenha_login_cont($senha_login_cont) {
        $this->senha_login_cont = $senha_login_cont;
    }

    function setStatus_cont($status_cont) {
        $this->status_cont = $status_cont;
    }

    function setData_integracao_cont($data_integracao_cont) {
        $this->data_integracao_cont = $data_integracao_cont;
    }

    function setTipo_usuario_cont($tipo_usuario_cont) {
        $this->tipo_usuario_cont = $tipo_usuario_cont;
    }

    function __construct($cnpj_cont, $cpf_admin_cont, $ie_cont, $nome_cont, $nome_fantasia_cont, $cep_cont, $logradouro_cont, $complemento_logradouro_cont, $numero_logradouro_cont, $bairro_logradouro_cont, $cidade_logradouro_cont, $uf_logradouro_cont, $telefone_cont, $email_cont, $usuario_login_cont, $senha_login_cont, $status_cont, $data_integracao_cont, $tipo_usuario_cont) {
        $this->cnpj_cont = $cnpj_cont;
        $this->cpf_admin_cont = $cpf_admin_cont;
        $this->ie_cont = $ie_cont;
        $this->nome_cont = $nome_cont;
        $this->nome_fantasia_cont = $nome_fantasia_cont;
        $this->cep_cont = $cep_cont;
        $this->logradouro_cont = $logradouro_cont;
        $this->complemento_logradouro_cont = $complemento_logradouro_cont;
        $this->numero_logradouro_cont = $numero_logradouro_cont;
        $this->bairro_logradouro_cont = $bairro_logradouro_cont;
        $this->cidade_logradouro_cont = $cidade_logradouro_cont;
        $this->uf_logradouro_cont = $uf_logradouro_cont;
        $this->telefone_cont = $telefone_cont;
        $this->email_cont = $email_cont;
        $this->usuario_login_cont = $usuario_login_cont;
        $this->senha_login_cont = $senha_login_cont;
        $this->status_cont = $status_cont;
        $this->data_integracao_cont = $data_integracao_cont;
        $this->tipo_usuario_cont = $tipo_usuario_cont;
    }
    
}
?>