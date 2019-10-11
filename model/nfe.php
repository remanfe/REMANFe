<?php


class nfe {
    var $nNF_nfe;
    var $cnpj_empresa_nfe;
    var $cNF_nfe;
    var $dhEmi_nfe;
    var $tp_nfe;
    var $natOp_nfe;
    var $rq_nfe;
    
    function getNNF_nfe() {
        return $this->nNF_nfe;
    }

    function getCnpj_empresa_nfe() {
        return $this->cnpj_empresa_nfe;
    }

        function getCNF_nfe() {
        return $this->cNF_nfe;
    }

    function getDhEmi_nfe() {
        return $this->dhEmi_nfe;
    }

    function getTp_nfe() {
        return $this->tp_nfe;
    }

    function getNatOp_nfe() {
        return $this->natOp_nfe;
    }

    function getRq_nfe() {
        return $this->rq_nfe;
    }

    function setNNF_nfe($nNF_nfe) {
        $this->nNF_nfe = $nNF_nfe;
    }
    
    function setCnpj_empresa_nfe($cnpj_empresa_nfe) {
        $this->cnpj_empresa_nfe = $cnpj_empresa_nfe;
    }

    function setCNF_nfe($cNF_nfe) {
        $this->cNF_nfe = $cNF_nfe;
    }

    function setDhEmi_nfe($dhEmi_nfe) {
        $this->dhEmi_nfe = $dhEmi_nfe;
    }

    function setTp_nfe($tp_nfe) {
        $this->tp_nfe = $tp_nfe;
    }

    function setNatOp_nfe($natOp_nfe) {
        $this->natOp_nfe = $natOp_nfe;
    }

    function setRq_nfe($rq_nfe) {
        $this->rq_nfe = $rq_nfe;
    }

    function __construct($nNF_nfe, $cnpj_empresa_nfe, $cNF_nfe, $dhEmi_nfe, $tp_nfe, $natOp_nfe, $rq_nfe) {
        $this->nNF_nfe = $nNF_nfe;
        $this->cnpj_empresa_nfe = $cnpj_empresa_nfe;
        $this->cNF_nfe = $cNF_nfe;
        $this->dhEmi_nfe = $dhEmi_nfe;
        $this->tp_nfe = $tp_nfe;
        $this->natOp_nfe = $natOp_nfe;
        $this->rq_nfe = $rq_nfe;
    }
}
?>

