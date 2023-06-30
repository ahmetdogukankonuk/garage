<?php

namespace App\Controllers;

use App\Models\VehiclesModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class VehiclesController extends BaseController
{
    public function index()
    {
        $vehiclesModel = new VehiclesModel();
        $vehicles = $vehiclesModel->getAllVehicles();

        // Twig template engine configuration
        $loader = new FilesystemLoader(__DIR__ . '/../views'); // Assuming the Twig templates are in the "views" directory
        $twig = new Environment($loader);

        // Render the template and return the result
        echo $twig->render('vehicles.twig', ['vehicles' => $vehicles]);
    }

}