<?php

namespace App\Models;

use CodeIgniter\Model;

class CompraItemModel extends Model
{

    protected $table = 'compraitem';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCompra', 'idProduto', 'valorUnitario', 'quantidade'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereCompraItem($data)
    {
        return $this->insert($data);
    }

    public function alteraCompraItem($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaCompraItem($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
}
