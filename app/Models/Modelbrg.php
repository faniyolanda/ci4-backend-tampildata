<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbrg extends Model
{
   protected $table = 'barang';
   protected $primaryKey = 'kode';
   protected $allowedFields = ['kode','nama','jenis','satuan','stok','harga','supplier'];

   public function getBarang()
   {
      $bulder = $this->db->table('barang');
      return $bulder->get();
   }
}
