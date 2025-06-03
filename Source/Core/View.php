<?php

namespace Source\Core;

class View
{

    private static $header;
    private static $footer;

    /**
     * Configura um header
     * @param string $view
     */
    public static function setHeader(string $view): void
    {
        $file = VIEW_PATH . "/{$view}.php";

        if (!file_exists($file)) {
            throw new \Exception("Header '{$view}' não encontrado.");
        }

        ob_start();
        require $file;
        static::$header = ob_get_clean();
    }

    /**
     * Configura um footer
     * @param string $view
     */
    public static function setFooter(string $view): void
    {
        $file = VIEW_PATH . "/{$view}.php";

        if (!file_exists($file)) {
            throw new \Exception("Footer '{$view}' não encontrado.");
        }

        ob_start();
        require $file;
        static::$footer = ob_get_clean();
    }

    /**
     * Renderiza uma view
     * @param string $view
     * @param array $data
     */
    public static function render(string $view, array $data): string
    {

        if (empty(static::$header)) {
            static::setHeader("/includes/header");
        }

        if (empty(static::$footer)) {
            static::setFooter("/includes/footer");
        }

        extract($data);

        $file = VIEW_PATH . "/{$view}.php";

        if (!file_exists($file)) {
            throw new \Exception("View '{$view}' não encontrada.");
        }

        ob_start();
        require $file;
        return static::$header . ob_get_clean() . static::$footer;
    }
}
