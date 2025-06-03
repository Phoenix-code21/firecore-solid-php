<?php

namespace Source\Tests;

use PHPUnit\Framework\TestCase;
use Source\Domain\Entities\Billet;
use Source\Domain\Repositories\MysqlBilletRepository;

class BilletRepositoryTest extends TestCase
{
    private MysqlBilletRepository $repository;

    protected function setUp(): void
    {

        if (DB_HOST != "localhost") {
            fwrite(STDERR, "🚫 Teste abortado: O banco de dados não está configurado para ambiente de desenvolvimento.\n");
            exit(1);
        }

        $this->repository = new MysqlBilletRepository();
    }

    /**
     * testa se o boleto foi criado com sucesso
     * @return void
     */
    public function testCreateBillet(): void
    {

        $billet = new Billet(rand(1, 9999), "PAGO", 10.50);

        $result = $this->repository->create($billet);

        $this->assertTrue($result, "Falha ao criar boleto");
    }
}
