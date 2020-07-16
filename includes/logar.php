<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST')
{

    //recupera o nome de usuário do formulário
    //addslashes é pra remover aspas para não causar problemas com o banco de dados
    $usuario = isset($_POST["usuarioNome"]) ? addslashes(trim($_POST["usuarioNome"])) : FALSE;

    //recupera a senha
    $senha = isset($_POST["usuarioSenha"]) ? addslashes(trim($_POST["usuarioSenha"])) : FALSE;

    if(!$senha || !$usuario){
        echo "Digite corretamente usuário e senha.";
        exit;
    }

    /* Executa a consulta no banco de dados,
     * caso o resultado seja um é porque o usuário existe.
    */

    $pwd_md5 = md5($senha);

    $banco = new BancoDeDados;
    //WHERE usuario = '$usuario' and senha_md5 = '$pwd_md5' and ativo = 1 LIMIT 1
    $banco->query("SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$pwd_md5'");

    foreach ($banco->result() as $dados) {}

    $total = $banco->linhas();

    if ($total != 0)
    {
      $_SESSION["idUsrS"] = $dados["id"];
      $_SESSION["nomeUsrS"] = $dados["usuario"];
      $_SESSION["nomeCompletoUsrS"] = $dados["nome"];
      header("Location: index.php");
      die();
    }
}
?>
