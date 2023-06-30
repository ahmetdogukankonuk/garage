<?php

namespace App\Controllers;

use App\Models\VehiclesModel;

class VehiclesController extends BaseController
{
    public function index()
    {
        $vehiclesModel = new VehiclesModel();
        $vehicles = $vehiclesModel->getAllVehicles();
        
        return view('vehicles', ['vehicles' => $vehicles]);
    }
}