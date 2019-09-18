<?php

class administrador {

    var $cpf_admin;
    var $nome_admin;
    var $cep_admin;
    var $logradouro_admin;
    var $complemento_logradouro_admin;
    var $numero_logradouro_admin;
    var $bairro_logradouro_admin;
    var $cidade_logradouro_admin;
    var $uf_logradouro_admin;
    var $celular_admin;
    var $celular_comercial_admin;
    var $email_admin;
    var $usuario_login_admin;
    var $senha_login_admin;
    var $status_admin;
    var $data_integracao_admin;
    var $tipo_usuario_admin;

    function getCpf_admin() {
        return $this->cpf_admin;
    }

    function getNome_admin() {
        return $this->nome_admin;
    }

    function getCep_admin() {
        return $this->cep_admin;
    }

    function getLogradouro_admin() {
        return $this->logradouro_admin;
    }

    function getComplemento_logradouro_admin() {
        return $this->complemento_logradouro_admin;
    }

    function getNumero_logradouro_admin() {
        return $this->numero_logradouro_admin;
    }

    function getBairro_logradouro_admin() {
        return $this->bairro_logradouro_admin;
    }

    function getCidade_logradouro_admin() {
        return $this->cidade_logradouro_admin;
    }

    function getUf_logradouro_admin() {
        return $this->uf_logradouro_admin;
    }

    function getCelular_admin() {
        return $this->celular_admin;
    }

    function getCelular_comercial_admin() {
        return $this->celular_comercial_admin;
    }

    function getEmail_admin() {
        return $this->email_admin;
    }

    function getUsuario_login_admin() {
        return $this->usuario_login_admin;
    }

    function getSenha_login_admin() {
        return $this->senha_login_admin;
    }

    function getStatus_admin() {
        return $this->status_admin;
    }

    function getData_integracao_admin() {
        return $this->data_integracao_admin;
    }

    function getTipo_usuario_admin() {
        return $this->tipo_usuario_admin;
    }

    function setCpf_admin($cpf_admin) {
        $this->cpf_admin = $cpf_admin;
    }

    function setNome_admin($nome_admin) {
        $this->nome_admin = $nome_admin;
    }

    function setCep_admin($cep_admin) {
        $this->cep_admin = $cep_admin;
    }

    function setLogradouro_admin($logradouro_admin) {
        $this->logradouro_admin = $logradouro_admin;
    }

    function setComplemento_logradouro_admin($complemento_logradouro_admin) {
        $this->complemento_logradouro_admin = $complemento_logradouro_admin;
    }

    function setNumero_logradouro_admin($numero_logradouro_admin) {
        $this->numero_logradouro_admin = $numero_logradouro_admin;
    }

    function setBairro_logradouro_admin($bairro_logradouro_admin) {
        $this->bairro_logradouro_admin = $bairro_logradouro_admin;
    }

    function setCidade_logradouro_admin($cidade_logradouro_admin) {
        $this->cidade_logradouro_admin = $cidade_logradouro_admin;
    }

    function setUf_logradouro_admin($uf_logradouro_admin) {
        $this->uf_logradouro_admin = $uf_logradouro_admin;
    }

    function setCelular_admin($celular_admin) {
        $this->celular_admin = $celular_admin;
    }

    function setCelular_comercial_admin($celular_comercial_admin) {
        $this->celular_comercial_admin = $celular_comercial_admin;
    }

    function setEmail_admin($email_admin) {
        $this->email_admin = $email_admin;
    }

    function setUsuario_login_admin($usuario_login_admin) {
        $this->usuario_login_admin = $usuario_login_admin;
    }

    function setSenha_login_admin($senha_login_admin) {
        $this->senha_login_admin = $senha_login_admin;
    }

    function setStatus_admin($status_admin) {
        $this->status_admin = $status_admin;
    }

    function setData_integracao_admin($data_integracao_admin) {
        $this->data_integracao_admin = $data_integracao_admin;
    }

    function setTipo_usuario_admin($tipo_usuario_admin) {
        $this->tipo_usuario_admin = $tipo_usuario_admin;
    }

    function __construct($cpf_admin, $nome_admin, $cep_admin, $logradouro_admin, $complemento_logradouro_admin, $numero_logradouro_admin, $bairro_logradouro_admin, $cidade_logradouro_admin, $uf_logradouro_admin, $celular_admin, $celular_comercial_admin, $email_admin, $usuario_login_admin, $senha_login_admin, $status_admin, $data_integracao_admin, $tipo_usuario_admin) {
        $this->cpf_admin = $cpf_admin;
        $this->nome_admin = $nome_admin;
        $this->cep_admin = $cep_admin;
        $this->logradouro_admin = $logradouro_admin;
        $this->complemento_logradouro_admin = $complemento_logradouro_admin;
        $this->numero_logradouro_admin = $numero_logradouro_admin;
        $this->bairro_logradouro_admin = $bairro_logradouro_admin;
        $this->cidade_logradouro_admin = $cidade_logradouro_admin;
        $this->uf_logradouro_admin = $uf_logradouro_admin;
        $this->celular_admin = $celular_admin;
        $this->celular_comercial_admin = $celular_comercial_admin;
        $this->email_admin = $email_admin;
        $this->usuario_login_admin = $usuario_login_admin;
        $this->senha_login_admin = $senha_login_admin;
        $this->status_admin = $status_admin;
        $this->data_integracao_admin = $data_integracao_admin;
        $this->tipo_usuario_admin = $tipo_usuario_admin;
    }

}
?>