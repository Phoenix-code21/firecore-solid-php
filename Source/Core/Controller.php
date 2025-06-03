<?php

namespace Source\Core;

class Controller
{
    public function __construct() {}

    protected function view($view, $data)
    {
        return View::render($view, $data);
    }
}
