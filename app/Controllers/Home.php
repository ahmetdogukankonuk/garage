<?php

namespace App\Controllers;

use App\Models\VehiclesModel;
use App\Models\BrandsModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class Home extends BaseController
{
    // Ana sayfa araç listeleme
    public function index(){

        $vehiclesModel = new VehiclesModel();
        $vehicles = $vehiclesModel->getAllVehicles();

        // Twig template engine config
        $loader = new FilesystemLoader(APPPATH . 'Views');
        $twig = new Environment($loader);

        // Twig templateini oluştur ve sonucu döndür
        echo $twig->render('home.twig', ['vehicles' => $vehicles]);

    }

    // Yeni araç sayfası
    public function vehicleNew(){

        $brandsModel = new BrandsModel();
        $brands = $brandsModel->getAllBrands();

        // Twig template engine config
        $loader = new \Twig\Loader\FilesystemLoader(APPPATH . 'Views');
        $twig = new \Twig\Environment($loader);

        // Twig templateini oluştur ve sonucu döndür
        echo $twig->render('vehicle_new.twig', ['brands' => $brands]);

    }

    // Yeni araç ekleme fonksiyonu
    public function addVehicle(){
        
        $brandName = $this->request->getPost('brandName');
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
            'brandName' => 'required',
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

        // VehiclesModel'i yükle
        $vehiclesModel = new VehiclesModel();

        // Vehicles tablosuna yeni bir araç kaydet
        $vehicleData = [
            'brandName' => $brandName,
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

    public function VehicleDetail($id){

        $vehiclesModel = new VehiclesModel();
        $vehicle = $vehiclesModel->getVehicleById($id);
    
        $brandsModel = new BrandsModel();
        $brands = $brandsModel->getAllBrands();
    
        // Twig template engine config
        $loader = new \Twig\Loader\FilesystemLoader(APPPATH . 'Views');
        $twig = new \Twig\Environment($loader);
    
        // Twig templateini oluştur ve sonucu döndür
        echo $twig->render('vehicle_detail.twig', ['vehicle' => $vehicle, 'brands' => $brands]);

    }
    
    public function updateVehicle($id){

        $brandName = $this->request->getPost('brandName');
        $modelName = $this->request->getPost('modelName');
        $modelYear = $this->request->getPost('modelYear');
        $fuelType = $this->request->getPost('fuelType');
        $plateNo = $this->request->getPost('plateNo');
        $chassisNo = $this->request->getPost('chassisNo');
        $customerName = $this->request->getPost('customerName');
        $customerPhone = $this->request->getPost('customerPhone');
        $dateReceived = $this->request->getPost('dateReceived');
        $dateDelivery = $this->request->getPost('dateDelivery');
        $situation = $this->request->getPost('situation');
        $description = $this->request->getPost('description');

        // Form validasyon kurallarını tanımla
        $validationRules = [
            'brandName' => 'required',
            'modelName' => 'required',
            'modelYear' => 'required',
            'fuelType' => 'required',
            'plateNo' => 'required',
            'customerName' => 'required',
            'customerPhone' => 'required',
        ];

        // Validasyon kurallarını kullanarak formu doğrula
        if (!$this->validate($validationRules)) {

            return redirect()->to(base_url('vehicle-detail/' . $id));

        }

        // VehiclesModel i yükle
        $vehiclesModel = new VehiclesModel();

        // Aracı id ye göre bul
        $existingVehicle = $vehiclesModel->find($id);
        if ($existingVehicle) {
            // Aracı güncelle
            $vehicleData = [
                'brandName' => $brandName,
                'modelName' => $modelName,
                'modelYear' => $modelYear,
                'fuelType' => $fuelType,
                'plateNo' => $plateNo,
                'chassisNo' => $chassisNo,
                'customerName' => $customerName,
                'customerPhone' => $customerPhone,
                'dateReceived' => $dateReceived,
                'dateDelivery' => $dateDelivery,
                'situation' => $situation,
                'description' => $description
            ];

            $update = $vehiclesModel->update($id, $vehicleData);
            if ($update) {

                return redirect()->to(base_url(''));

            } else {

                return redirect()->to(base_url('vehicle-detail/' . $id));

            }
        } else {

            return redirect()->to(base_url(''));

        }
    }

    // ID ye göre araç silme fonksiyonu
    public function vehicleDelete($id){

        $vehiclesModel = new VehiclesModel();
        $vehicle = $vehiclesModel->getVehicleById($id);

        if ($vehicle) {

            $vehiclesModel->deleteVehicle($id);
            
            return redirect()->to(base_url());

        } else {

            echo "Araç bulunmamakta.";

        }
    }



}
?>