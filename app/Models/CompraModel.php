<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraModel extends Model
{

    protected $table = 'compra';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCliente', 'dataCompra', 'observacao'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereCompra($data)
    {
        return $this->insert($data);
    }

    public function alteraCompra($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaCompra($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
}
