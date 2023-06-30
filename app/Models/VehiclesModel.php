<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiclesModel extends Model
{
    protected $table = 'vehicles';
    protected $primaryKey = 'id';

    public function getAllVehicles()
    {
        return $this->findAll();
    }
}
