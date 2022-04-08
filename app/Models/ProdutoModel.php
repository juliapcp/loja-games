<?php

namespace App\Models;
use CodeIgniter\Model;

class ProdutoModel extends Model {

    protected $table = 'produto';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descricao', 'tipo','valorBase', 'quantidade'];

    public function getDados($id = null){
        if ($id == null){
            return $this->findAll();
        }
        return $this->asArray()->where(['id' => $id])->first();
    }

    public function insereProduto($data)
    {            
        return $this->insert($data);
    }

    public function alteraProduto($id,$data)
    {
        return $this->update($id, $data);
    }

    public function deletaProduto ($id = null){
        if ($id != null){
            $this->delete($id);
        }
    }

}
