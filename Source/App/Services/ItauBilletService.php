<?php

namespace Source\App\Services;

use Source\App\Interfaces\BilletInterface;
use stdClass;

class ItauBilletService implements BilletInterface
{

    /**
     * Cria um boleto
     * @param object $request
     * @return object
     */
    public function create(object $request): object
    {
        $response = new stdClass;
        return $response;
    }

    /**
     * Cancela um boleto
     * @param object $request
     * @return object
     */
    public function cancel(int $billet_id): object
    {
        $response = new stdClass;
        return $response;
    }

    /**
     * Dar baixa no boleto
     * @param object $request
     * @return object
     */
    public function low(int $billet_id): object
    {
        $response = new stdClass;
        return $response;
    }

    /**
     * Obtem status do boleto
     * @param object $request
     * @return object
     */
    public function getStatus(int $billet_id): object
    {
        $response = new stdClass;
        return $response;
    }
}
