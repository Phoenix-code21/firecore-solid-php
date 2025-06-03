<?php

namespace Source\App\Services;

use Source\App\Interfaces\BilletInterface;
use Source\Domain\Entities\Billet;
use Source\Domain\Repositories\MysqlBilletRepository;
use stdClass;

class AssasBilletService implements BilletInterface
{

    /**
     * Cria um boleto
     * @param object $request
     * @return object
     */
    public function create(object $request): Billet
    {
        $response = new stdClass;
        $response->billet_id = rand(1, 9999);
        $response->status = "GERADO";
        $response->amount = 100;

        $billet = new Billet($response->billet_id, $response->status, $response->amount);

        $repository = new MysqlBilletRepository();

        if (!$repository->create($billet)) {
            throw new \Exception("Não foi possível criar o boleto");
        }

        return $billet;
    }

    /**
     * Cancela um boleto
     * @param int $billet_id
     * @return object
     */
    public function cancel(int $billet_id): object
    {
        $response = new stdClass;
        return $response;
    }

    /**
     * Dar baixa no boleto
     * @param int $billet_id
     * @return object
     */
    public function low(int $billet_id): object
    {
        $response = new stdClass;
        return $response;
    }

    /**
     * Obtem status do boleto
     * @param int $billet_id
     * @return object
     */
    public function getStatus(int $billet_id): object
    {
        $response = new stdClass;
        return $response;
    }
}
