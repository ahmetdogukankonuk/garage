<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandsModel extends Model
{
    protected $table = 'brands';
    protected $primaryKey = 'id';

    public function getAllBrands(){

        return $this->findAll();

    }

}
