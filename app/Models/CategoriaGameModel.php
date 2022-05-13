<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaGameModel extends Model
{

    protected $table = 'categoriagame';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idCategoria', 'idGame'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function getProdutosComCategoria($idCategoria)
    {
        return $this->asArray()->where(['idCategoria' => $idCategoria])->first();
    }

    public function getCategoriasComProduto($idProduto)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categoriagame');
        $builder->select('idCategoria, idGame');
        $builder->where(['idGame' => $idProduto]);
        return $builder->get()->getResult('array');
    }
    
    public function insereCategoriaGame($data)
    {
        return $this->insert($data);
    }

    public function alteraCategoriaGame($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaCategoriaGame($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
    public function deletaCategoriaGamePeloGame($idGame = null)
    {
        if ($idGame != null) {
            $this->where('idGame', $idGame)->delete();
        }
    }
    
}
