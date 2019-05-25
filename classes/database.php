<?php
  if(!class_exists('BancoDeDados'))
  {
    class BancoDeDados
    {
      private $total; #contar o número de registros
      private $array_dados;
      public $pdo;
      public $banco;

      public function __construct()
      {
        try
        {
          $host = 'exatasg.com.br';
          $usuario = 'exatasgc_sgadmin';
          $senha = '36541287';
          $db = 'exatasgc_sge';

          $this->banco = $db;
          $this->pdo = new PDO("mysql:dbname=".$db.";host=".$host, $usuario, $senha);
          $this->pdo->exec("set names utf8");

        } catch (PDOException $e) {
          echo '<div class="alert alert-danger"><b>Erro:</b> não foi possivel se conectar a '.$this->banco.' - <b>Detalhes:</b> '.$e->getMessage().'</div>';
        }

      }

      public function query($sql)
      {
        $query = $this->pdo->query($sql);
        $this->linhas = $query->rowCount();
        $this->$array_dados = $query->fetchAll();
      }

      public function linhas()
      {
        return $this->linhas;
      }

      public function result()
      {
        return $thits->array_dados;
      }

    }
  }
?>
