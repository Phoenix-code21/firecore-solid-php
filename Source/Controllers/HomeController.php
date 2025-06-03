<?php

namespace Source\Controllers;

use Source\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        echo $this->view("home", []);
    }
}
