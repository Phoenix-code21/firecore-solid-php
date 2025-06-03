<?php

namespace Source\Domain\Entities;

class Billet
{
    public int $billet_id;
    public string $status;
    public float $amount;

    public function __construct(
        int $billet_id,
        string $status,
        float $amount
    ) {
        $this->billet_id = $billet_id;
        $this->status = $status;
        $this->amount = $amount;
    }
}
