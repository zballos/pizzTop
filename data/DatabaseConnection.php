<?php

/**
 * Class DatabaseConnection
 * @package data
 */
class DatabaseConnection
{
    private static $pdo;

    /**
     * not
     */
    public function __construct()
    {
        // construct
    }

    public function __destruct()
    {
        $this->desconectar();
    }

    /**
     *  SQL SERVER : mssql:host
     *  MySQL : mysql:host=xxx;port=xxx;dbname=xxx
     *
     */
    public function conectar()
    {
        try {
            self::$pdo = new PDO(
                "mysql:host=localhost;dbname=pizz",
                'root',
                '1234',
                [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
            );
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro de Conexão " . $e->getMessage() . "\n");
        }
        return self::$pdo;
    }

    /**
     * Desconecta o banco de dados
     */
    public function desconectar()
    {
        self::$pdo = null;
    }

    /**
     * Lista
     * @param $sql , Query de consulta
     * @param null $params, parâmetros
     * @param null $class $classe
     * @return mixed array com resultados
     */
    public function listar($sql, $params = null, $class = null)
    {
        $consulta = $this->conectar()->prepare($sql);
        $consulta->execute($params);
        if ($class != null) {
            $result = $consulta->fetchAll(PDO::FETCH_CLASS, $class) or die("");
        } else {
            $result = $consulta->fetchAll(PDO::FETCH_OBJ) or die("Não possui clientes cadastrados!");
        }
        return $result;
    }

    /**
     * @param $sql
     * @param null $params
     * @return mixed
     */
    public function inserir($sql, $params = null)
    {
        $ins = $this->conectar()->prepare($sql);
        $ins->execute($params);
        $retorno = self::$pdo->lastInsertId() or die(print_r($ins->errorInfo(), true));
        return $retorno;
    }

    /**
     * @param $sql
     * @param null $params
     * @return bool
     */
    public function atualizar($sql, $params = null)
    {
        $at = $this->conectar()->prepare($sql);
        $at->execute($params);
        return true;
    }

    /**
     * @param $sql
     * @param null $params
     * @return bool
     */
    public function deletar($sql, $params = null)
    {
        $banco = $this->conectar()->prepare($sql);
        $banco->execute($params);
        return true;
    }
}
