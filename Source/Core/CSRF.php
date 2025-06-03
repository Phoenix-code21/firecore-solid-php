<?php

namespace Source\Core;

class CSRF
{
    /**
     * Gera um token e salva na sessão
     * @return bool
     */
    public static function generate(): string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $token = bin2hex(random_bytes(40));
        $_SESSION['_csrf_token'] = $token;
        return $token;
    }

    /**
     * Valida se o token recebido é válido
     * @param string $token
     * @return bool
     */
    public static function validate(string $token): bool
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        return isset($_SESSION['_csrf_token']) && hash_equals($_SESSION['_csrf_token'], $token);
    }

    /**
     * Remove o token
     * @return void
     */
    public static function remove(): void
    {
        unset($_SESSION['_csrf_token']);
    }
}
