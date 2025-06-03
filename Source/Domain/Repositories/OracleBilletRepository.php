<?php

namespace Source\Domain\Repositories;

use Source\Core\DatabaseRepository;
use Source\Domain\Entities\Billet;
use Source\Domain\Interfaces\EntityInterface;

class OracleBilletRepository extends DatabaseRepository implements EntityInterface
{
    /**
     * cadastra no banco de dados.
     * @param Billet $billet
     */
    public function create(Billet $billet): void {}

    /**
     * obtem boleto do banco de dados
     * @param int $billet_id
     */
    public function findById($billet_id): void {}

    /**
     * atualiza boleto do banco de dados
     * @param int $billet_id
     */
    public function update(Billet $billet): void {}

    /**
     * exclui boleto do banco de dados
     * @param int $billet_id
     */
    public function delete($billet_id): void {}

    public function entity(): string
    {
        return "test.billets";
    }
}
