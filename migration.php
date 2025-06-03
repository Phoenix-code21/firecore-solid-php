<?php

require __DIR__ . "/database/DB.php";
require __DIR__ . "/database/MigrationManager.php";

$manager = new MigrationManager();

$action = $argv[1] ?? null;
$entity = $argv[2] ?? null; 

if (!$action) {
    echo "\033[33mComandos disponíveis:\033[0m\n";
    echo "  php migration.php migrate-all      -> Executa todas as migrations\n";
    echo "  php migration.php rollback-all     -> Rollback de todas as migrations\n";
    echo "  php migration.php migrate [entity]    -> Executa migration específica\n";
    echo "  php migration.php rollback [entity]   -> Rollback de migration específica\n";
    exit;
}

switch ($action) {
    case 'migrate-all':
        $manager->migrateAll();
        break;
    case 'rollback-all':
        $manager->rollbackAll();
        break;
    case 'migrate':
        if (!$entity) exit("Informe a entidade!\n");
        $manager->migrate($entity);
        break;
    case 'rollback':
        if (!$entity) exit("Informe a entidade!\n");
        $manager->rollback($entity);
        break;
    default:
        echo "\033[31m Comando não reconhecido.\033[0m\n";
        break;
}
