<?php

namespace App\Models;

use CodeIgniter\Model;

class LokasiModel extends Model
{
    protected $table = 'lokasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_lokasi', 'negara', 'provinsi', 'kota', 'created_at'];
    // Constructor
    // public function __construct()
    // {
    //     parent::__construct(); // Call the parent constructor if needed
    //     // Additional initialization code can go here
    // }
}
