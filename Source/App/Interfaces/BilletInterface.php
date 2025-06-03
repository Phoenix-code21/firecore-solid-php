<?php

namespace Source\App\Interfaces;

interface BilletInterface
{
    // cria um boleto
    function create(object $request);

    // cancela um boleto
    function cancel(int $billet_id);

    // dar baixa no boleto
    function low(int $billet_id);

    // obtem status do boleto
    function getStatus(int $billet_id);
}
