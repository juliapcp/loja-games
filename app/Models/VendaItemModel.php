<?php

namespace App\Models;

use CodeIgniter\Model;

class VendaItemModel extends Model
{

    protected $table = 'vendaitem';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idVenda', 'idProduto', 'valorUnitario', 'quantidade'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereVendaItem($data)
    {
        return $this->insert($data);
    }

    public function alteraVendaItem($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaVendaItem($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
}
