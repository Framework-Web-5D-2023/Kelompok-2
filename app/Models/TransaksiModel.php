<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_user', 'id_membership', 'harga'];
    protected $useTimestamp = true;

    public function allTransaction(){
        return $this->findAll();
        
    }

}
?>