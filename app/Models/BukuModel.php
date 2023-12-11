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
    public function getDetail()
    {
        return $this->findall();
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

    public function getPathAndStatusById($id_buku)
    {
        // Fetch the path and status_premium based on the provided id_buku
        // Assuming 'path' and 'status_premium' are the columns where you store the file path and premium status
        $result = $this->where('id_buku', $id_buku)
            ->select('path, status_premium')
            ->first();

        // Check if the result exists before accessing its properties
        if ($result) {
            return [
                'path' => $result['path'],
                'status_premium' => $result['status_premium']
            ];
        } else {
            return null; // Adjust this based on your error handling strategy
        }
    }

}
