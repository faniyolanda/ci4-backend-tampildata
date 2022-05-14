<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsepeda extends Model
{
   protected $table = 'sepeda';
   protected $primaryKey = 'kode';
   protected $allowedFields = ['kode','jenis','harga','jumlah'];


   public function getSepeda()
   {
      $bulder = $this->db->table('sepeda');
      return $bulder->get();
   }

}

