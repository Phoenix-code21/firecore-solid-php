<?php

function start_app()
{
    if (!defined('APP_PATH') || empty(APP_PATH)) {
        $html = <<<HTML
            <p style='font-size:20px'>
                Configure seu ambiente antes de começar: <br> 
                <strong>Source → Boot → Config.php</strong>
            </p>
        HTML;

        echo $html;
        exit;
    }
}

function csrf_token()
{
    return (new Source\Core\CSRF)::generate();
}

function csrf_input()
{
    return '<input type="hidden" name="_csrf_token" value="' . csrf_token() . '">';
}

function csrf_validate($token)
{
    return (new Source\Core\CSRF)::validate($token);
}

function csrf_remove()
{
    return (new Source\Core\CSRF)::remove();
}
