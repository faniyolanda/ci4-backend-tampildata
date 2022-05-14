<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmhs extends Model
{
   protected $table = 'mahasiswa';
   protected $primaryKey = 'nobp';
   protected $allowedFields = ['nobp','nama','alamat','nohp'];


   public function getMhs()
   {
      $bulder = $this->db->table('mahasiswa');
      return $bulder->get();
   }

}

