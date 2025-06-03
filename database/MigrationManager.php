<?php

class MigrationManager
{
    private string $path;

    public function __construct()
    {
        $this->path = __DIR__ . "/migrations";
    }

    /**
     * Lista todas as migrations no diretório
     */
    public function listMigrations(): array
    {
        $files = array_diff(scandir($this->path), ['.', '..']);
        sort($files);
        return array_values($files);
    }

    /**
     * Executa todas as migrations (UP)
     */
    public function migrateAll(): void
    {
        foreach ($this->listMigrations() as $file) {
            $this->runMigration($file, 'up');
        }
    }

    /**
     * Rollback em todas as migrations (DOWN)
     */
    public function rollbackAll(): void
    {
        // Rollback na ordem inversa
        $files = $this->listMigrations();
        rsort($files);

        foreach ($files as $file) {
            $this->runMigration($file, 'down');
        }
    }

    /**
     * Executa uma migration específica
     */
    public function migrate(string $entity): void
    {
        $file = "{$entity}_table.php";
        $this->runMigration($file, 'up');
    }

    /**
     * Rollback de uma migration específica
     */
    public function rollback(string $entity): void
    {
        $file = "{$entity}_table.php";
        $this->runMigration($file, 'down');
    }

    /**
     * Executa ou faz rollback
     */
    private function runMigration(string $file, string $action): void
    {
        $filepath = "{$this->path}/{$file}";

        if (!file_exists($filepath)) {
            $this->echoError("Migration não encontrada: {$file}");
            return;
        }

        $migration = require $filepath;

        if (!method_exists($migration, $action)) {
            $this->echoError("Método '{$action}' não encontrado em {$file}");
            return;
        }

        try {
            $rows = $migration->{$action}();
            $this->echoSuccess("{$action}: {$file} | rows afetadas: {$rows}");
        } catch (\Throwable $e) {
            $this->echoError("Erro ao executar {$file}: " . $e->getMessage());
        }
    }

    /**
     * Echo com verde
     */
    private function echoSuccess(string $message): void
    {
        echo "\033[32m{$message}\033[0m\n";
    }

    /**
     * Echo com vermelho
     */
    private function echoError(string $message): void
    {
        echo "\033[31m{$message}\033[0m\n";
    }

    /**
     * Echo com azul
     */
    public function echoInfo(string $message): void
    {
        echo "\033[34m{$message}\033[0m\n";
    }
}
