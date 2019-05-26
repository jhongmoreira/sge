 <?php 

    function format($mask,$string){
        {
            return  vsprintf($mask, str_split($string));
        }
    }    

    function verificaAdm($permissao, $html, $limitado){
        if ($permissao == "A"){
            echo $html;
        }else{
            echo $limitado;
        }
    }

    function verSelecao($valor, $valorDB){
        if ($valor == $valorDB){
            echo "selected";
        }

        unset($valor, $valorDB);
    }

?>