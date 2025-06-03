<?php

class DB
{

    private static $instance;
    private static $options = array(
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL,
    );

    /**
     * Realiza conexão com banco de dados
     */
    protected static function Connect(): void
    {
        try {
            static::$instance = new \PDO(
                "mysql:host=localhost;port=3306;dbname=test;charset=utf8mb4",
                "root",
                "",
                static::$options
            );
        } catch (\PDOException $exception) {
            echo $exception;
            exit;
        }
    }

    /**
     * Obtem instancia da conexão
     * @return \PDO
     */
    public static function getInstance(): \PDO
    {
        if (empty(static::$instance)) {
            static::Connect();
        }
        return static::$instance;
    }
}
