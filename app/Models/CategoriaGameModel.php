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
}
