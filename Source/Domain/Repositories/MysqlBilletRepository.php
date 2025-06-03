<?php

namespace Source\Domain\Repositories;

use Source\Core\DatabaseRepository;
use Source\Domain\Entities\Billet;
use Source\Domain\Interfaces\EntityInterface;

class MysqlBilletRepository extends DatabaseRepository implements EntityInterface
{

    /**
     * cadastra no banco de dados.
     * @param Billet $billet
     */
    public function create(Billet $billet): bool
    {
        $sql = "INSERT INTO {$this->entity()} (billet_id, status, amount) VALUES (:billet_id, :status, :amount)";
        $params = [
            "billet_id" => $billet->billet_id,
            "status" => $billet->status,
            "amount" => $billet->amount
        ];

        return $this->execute($sql, $params);
    }

    /**
     * obtem boleto do banco de dados
     * @param int $billet_id
     */
    public function findById(int $billet_id): void {}

    /**
     * atualiza boleto do banco de dados
     * @param int $billet_id
     */
    public function update(Billet $billet): void {}

    /**
     * exclui boleto do banco de dados
     * @param int $billet_id
     */
    public function delete(int $billet_id): void {}

    /**
     * Entidade 
     * @return string
     */
    public function entity(): string
    {
        return "test.billets";
    }
}
