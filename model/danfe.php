<?php
    class danfe{
        var $chave_acesso_danfe;
        var $cnoj_emrpresa_danfe;
        var $arq_danfe;
        
        function getChave_acesso_danfe() {
            return $this->chave_acesso_danfe;
        }

        function getCnoj_emrpresa_danfe() {
            return $this->cnoj_emrpresa_danfe;
        }

        function getArq_danfe() {
            return $this->arq_danfe;
        }

        function setChave_acesso_danfe($chave_acesso_danfe) {
            $this->chave_acesso_danfe = $chave_acesso_danfe;
        }

        function setCnoj_emrpresa_danfe($cnoj_emrpresa_danfe) {
            $this->cnoj_emrpresa_danfe = $cnoj_emrpresa_danfe;
        }

        function setArq_danfe($arq_danfe) {
            $this->arq_danfe = $arq_danfe;
        }

        function __construct($chave_acesso_danfe, $cnoj_emrpresa_danfe, $arq_danfe) {
            $this->chave_acesso_danfe = $chave_acesso_danfe;
            $this->cnoj_emrpresa_danfe = $cnoj_emrpresa_danfe;
            $this->arq_danfe = $arq_danfe;
        }
    }
?>


