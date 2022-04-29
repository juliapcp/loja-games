<?php

namespace App\Models;

use CodeIgniter\Model;

class VendaModel extends Model

{

    protected $table = 'venda';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCliente', 'dataVenda', 'observacao'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereVenda($data)
    {
        return $this->insert($data);
    }

    public function alteraVenda($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaVenda($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
}
