<?php

namespace App\Models;
use CodeIgniter\Model;

class ClienteModel extends Model {

    protected $table = 'cliente';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'celular', 'email'];

    public function getDados($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    

    public function insereCliente($data)
    {
        return $this->insert($data);
    }

    public function alteraCliente($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaCliente($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
}
