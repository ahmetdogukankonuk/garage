<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiclesModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['brandName', 'modelName', 'modelYear', 'fuelType', 'plateNo', 'chassisNo', 'customerName', 'customerPhone', 'dateReceived', 'dateDelivery', 'description', 'situation'];
    
    public function getAllVehicles(){

        return $this->findAll();

    }

    public function getVehicleById($id){

        return $this->find($id);

    }

    public function deleteVehicle($id){

        return $this->delete($id);

    }

    public function insertVehicle($data){

        return $this->insert($data);

    }
}
