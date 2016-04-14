<?php
//$data = new DatabaseConnection();
//var_dump($data->connect());
class DatabaseConnection
{
    private static $pdo;

    public function __construct(){}

    public function __destruct() {
        $this->disconnect();
    }

    /*
     *  SQL SERVER : mssql:host
     *  MySQL : mysql:host=xxx;port=xxx;dbname=xxx
     *  Postgres : 
     */
    public function conectar()
    {
        try{
            self::$pdo = new PDO(
                "mysql:host=localhost;dbname=pizz", 
                'root', 
                '1562',
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Erro de Conexão " . $e->getMessage() . "\n");
            //exit;
        }
        return self::$pdo;
    }
    public function desconectar()
    {
        self::$pdo = null;
        var_dump(self::$pdo);
    }

    public function listar($sql,$params=null, $class = null){
        $consulta = $this->conectar()->prepare($sql);
        $consulta->execute($params);
        if($class != null){
            $result = $consulta->fetchAll(PDO::FETCH_CLASS, $class) or die("");
        }else{
            $result = $consulta->fetchAll(PDO::FETCH_OBJ) or die("Não possui clientes cadastrados!");
        }
        return $result;
    }
    public function inserir($sql, $params = null){
        $ins = $this->conectar()->prepare($sql);
        $ins->execute($params);
        $retorno = self::$pdo->lastInsertId();// or die(print_r($ins->errorInfo(), true));
        return $retorno;
    }
    public function atualizar($sql, $params = null){
        $at = $this->conectar()->prepare($sql);
        $at->execute($params);
        //$result = self::$pdo->rowCount();// or die(print_r($at->errorInfo(), true));
        return true;
    }
    public function deletar($sql, $params = null){
        $banco = $this->conectar()->prepare($sql);
        $banco->execute($params);
        //$result = $banco->rowCount() or die(print_r($banco->errorInfo(), true));
        return true;
    }
}
?>
