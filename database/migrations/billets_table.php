<?php

require_once __DIR__ . '../../DB.php';

return new class {
    /**
     * Subir tabela
     */
    public function up(): int
    {
        $query = DB::getInstance()->exec("
           CREATE TABLE IF NOT EXISTS `billets` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `billet_id` varchar(50) NOT NULL DEFAULT '0',
                `status` varchar(50) NOT NULL DEFAULT '0',
                `amount` float NOT NULL DEFAULT 0,
                `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
        ");

        return $query;
    }

    /**
     * Excluir tabela
     */
    public function down(): void
    {
        DB::getInstance()->exec("DROP TABLE IF EXISTS billets;");
    }
};
