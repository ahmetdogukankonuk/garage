<?php

namespace App\Controllers;

use App\Models\VehiclesModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Home extends BaseController
{
    public function index()
    {
        $vehiclesModel = new VehiclesModel();
        $vehicles = $vehiclesModel->getAllVehicles();

        // Twig template engine configuration
        $loader = new FilesystemLoader(APPPATH . 'Views');
        $twig = new Environment($loader);

        // Render the template and return the result
        echo $twig->render('home.twig', ['vehicles' => $vehicles]);
    }
}
?>