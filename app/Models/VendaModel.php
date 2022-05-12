<?php

namespace App\Models;

use CodeIgniter\Model;

class VendaModel extends Model

{

    protected $table = 'venda';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCliente', 'dataCompra', 'observacao','idProduto', 'valorUnitario', 'quantidade'];

    public function getDados($id = null)
    {
        if ($id == null) {
            $db      = \Config\Database::connect();
            $builder = $db->table('venda');
            $builder->select('*');
            $builder->join('cliente', 'cliente.id = venda.idCliente');
            $builder->join('produto', 'produto.id = venda.idProduto');
            return $builder->get()->getResult('array');
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function getClienteMaiorGasto()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('venda');
        $builder->select('sum(VALORUNITARIO * quantidade)  as valorGasto');
        $builder->select('nome');
        $builder->join('cliente', 'cliente.id = venda.idCliente');
        $builder->groupBy('idCliente');
        $builder->orderBy('valorGasto desc');
        $builder->limit(1);
        return $builder->get()->getResult('array');
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
