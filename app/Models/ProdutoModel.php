<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{

    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descricao', 'tipo', 'valorBase', 'quantidade'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereProduto($data)
    {
        return $this->insert($data);
    }

    public function alteraProduto($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaProduto($id = null)
    {
        if ($id != null) {
            $categoriaGame = new CategoriaGameModel();
            $categoriaGame->deletaCategoriaGamePeloGame($id);
            $this->delete($id);
        }
    }

    public function getMaisCaro()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produto');
        $builder->select('descricao, valorbase');
        $builder->orderBy('valorBase desc');
        $builder->limit(1);
        return $builder->get()->getResult('array');
    }

    public function getEmMaisQuantidade()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('produto');
        $builder->select('descricao, quantidade');
        $builder->orderBy('valorBase desc');
        $builder->limit(1);
        return $builder->get()->getResult('array');
    }
}
