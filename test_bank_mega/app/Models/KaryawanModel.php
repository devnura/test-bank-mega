<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table          = 'karyawan';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = ['id', 'nip', 'nama', 'division'];

}