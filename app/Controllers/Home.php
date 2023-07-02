<?php

namespace App\Controllers;

use App\Models\VehiclesModel;
use App\Models\BrandsModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Home extends BaseController
{
    public function index(){

        $vehiclesModel = new VehiclesModel();
        $vehicles = $vehiclesModel->getAllVehicles();

        // Twig template engine configuration
        $loader = new FilesystemLoader(APPPATH . 'Views');
        $twig = new Environment($loader);

        // Render the template and return the result
        echo $twig->render('home.twig', ['vehicles' => $vehicles]);

    }

    public function vehicleDetail($id){

        $vehiclesModel = new VehiclesModel();
        $vehicle = $vehiclesModel->getVehicleById($id);

        if ($vehicle) {

        // Twig template engine configuration
        $loader = new FilesystemLoader(APPPATH . 'Views');
        $twig = new Environment($loader);
            echo $twig->render('vehicle_detail.twig', ['vehicle' => $vehicle]);
        } else {
            echo "Araç bulunamadı.";
        }

    }

    public function vehicleDelete($id){

        $vehiclesModel = new VehiclesModel();
        $vehicle = $vehiclesModel->getVehicleById($id);

        if ($vehicle) {

            $vehiclesModel->deleteVehicle($id);
            
            return redirect()->to(base_url());

        } else {

            echo "Vehicle with ID $id does not exist.";

        }
    }

    public function vehicleNew(){

        $brandsModel = new BrandsModel();
        $brands = $brandsModel->getAllBrands();

        // Twig template engine configuration
        $loader = new \Twig\Loader\FilesystemLoader(APPPATH . 'Views');
        $twig = new \Twig\Environment($loader);

        // Render the vehicle_new template and return the result
        echo $twig->render('vehicle_new.twig', ['brands' => $brands]);

    }

    public function addVehicle(){

        // Form verilerini al
        $brandID = $this->request->getPost('brandID');
        $modelName = $this->request->getPost('modelName');
        $modelYear = $this->request->getPost('modelYear');
        $fuelType = $this->request->getPost('fuelType');
        $plateNo = $this->request->getPost('plateNo');
        $chassisNo = $this->request->getPost('chassisNo');
        $customerName = $this->request->getPost('customerName');
        $customerPhone = $this->request->getPost('customerPhone');
        $dateReceived = $this->request->getPost('dateReceived');
        $dateDelivery = $this->request->getPost('dateDelivery');
        $description = $this->request->getPost('description');

        // Form validasyon kurallarını tanımla
        $validationRules = [
            'brandID' => 'required',
            'modelName' => 'required',
            'modelYear' => 'required',
            'fuelType' => 'required',
            'plateNo' => 'required',
            'customerName' => 'required',
            'customerPhone' => 'required',
        ];

        // Validasyon kurallarını kullanarak formu doğrula
        if (!$this->validate($validationRules)) {
            return redirect()->to(base_url('vehicle-new'));
        }

        // VehiclesModel'i yükleyin
        $vehiclesModel = new VehiclesModel();

        // Vehicles tablosuna yeni bir araç kaydedin
        $vehicleData = [
            'brandID' => $brandID,
            'modelName' => $modelName,
            'modelYear' => $modelYear,
            'fuelType' => $fuelType,
            'plateNo' => $plateNo,
            'chassisNo' => $chassisNo,
            'customerName' => $customerName,
            'customerPhone' => $customerPhone,
            'dateReceived' => $dateReceived,
            'dateDelivery' => $dateDelivery,
            'description' => $description
        ];

        $insert = $vehiclesModel->insert($vehicleData);

        if ($insert) {
            return redirect()->to(base_url(''));
        } else {
            return redirect()->to(base_url('vehicle-new'));
        }
    }



}
?>