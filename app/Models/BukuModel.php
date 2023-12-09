<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $allowedFields = ['judul', 'pengarang', 'penerbit', 'tahun_terbit', 'sinopsis', 'status_premium', 'path', 'sampul'];

    protected $useTimestamp = true;
    protected $protectFields = false;
    public function getDetail(){
       return $this -> findall(); 
    }
    
    public function getDetailById($id)
    {
        return $this->where('id_buku', $id)->first();
    }
    
    //CRUD
    public function getDetailBook($id)
    {
        return $this->find($id);
    }
    public function updateBook($id, $data)
    {
      return $this->update($id, $data);
    }
}
