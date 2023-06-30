<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Home extends BaseController
{
    public function index()
    {
        // Twig template engine configuration
        $loader = new FilesystemLoader(__DIR__ . '/../views'); // Assuming the Twig templates are in the "views" directory
        $twig = new Environment($loader);

        $template = $twig->load('welcome_message.twig');
        return $template->render(['the' => 'variables', 'go' => 'here']);
    }
}
