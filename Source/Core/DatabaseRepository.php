<?php

namespace Source\Core;

class DatabaseRepository extends DB
{

    /**
     * Retorna apenas um único dado
     * @param string $sql
     * @param array $params
     * @return object
     */
    protected function fetch(string $sql, array $params = []): object
    {
        $pst = parent::prepare($sql);
        $pst->execute($params);
        return $pst->fetch();
    }

    /**
     * Retorna multiplos dados
     * @param string $sql
     * @param array $params
     * @return array
     */
    protected function fetchAll(string $sql, array $params = []): array
    {
        $pst = parent::prepare($sql);
        $pst->execute($params);
        return $pst->fetchAll();
    }

    /**
     * Executa queries INSERT, UPDATE ou DELETE
     * @param string $sql
     * @param array $params
     * @return bool
     */
    protected function execute(string $sql, array $params = []): bool
    {
        $stmt = parent::prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Retorna o último ID inserido
     * @return string
     */
    protected function lastInsertId(): string
    {
        return parent::getInstance()->lastInsertId();
    }

    /**
     * Prepare uma transação
     * @return bool
     */
    protected function beginTransaction(): bool
    {
        return parent::getInstance()->beginTransaction();
    }

    /**
     * Executa uma rollback caso hava erro de transação
     * @return bool
     */
    protected function rollBack(): bool
    {
        return parent::getInstance()->rollBack();
    }

    /**
     * Executa uma transação
     * @return bool
     */
    protected function commit(): bool
    {
        return parent::getInstance()->commit();
    }
}
