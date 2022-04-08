<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descricao'];

    public function getDados($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereCategoria($data)
    {
        return $this->insert($data);
    }

    public function alteraCategoria($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletaCategoria($id = null)
    {
        if ($id != null) {
            $this->delete($id);
        }
    }
}
