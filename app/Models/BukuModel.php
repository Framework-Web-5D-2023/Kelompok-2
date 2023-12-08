<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $useTimestamp = true;
    public function getDetail(){
       return $this -> findall(); 
    }
    
    public function getDetailById($id)
    {
        return $this->where('id_buku', $id)->first();
    }
}
