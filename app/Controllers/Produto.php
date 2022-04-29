<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class Produto extends BaseController
{
    public function listagem()
    {
        $produtoModel = new ProdutoModel();
        $data['produtos'] = $produtoModel->getDados();
        return view('produtos/listagem', $data);
    }
    public function mostraCadastro()
    {
        return view('produtos/cadastro');
    }
    public function cadastra(){
        $rules = [
            'descricao' => 'required|min_length[3]|max_length[100]',
            'tipo' => 'required',
            'valorBase' => 'required',
            'quantidade' => 'required'
        ]; 

        $produtoModel = new ProdutoModel();

        if ($this->validate($rules)) {
            $data = array(
                    'descricao' => $this->request->getVar('descricao'),
                    'tipo' => $this->request->getVar('tipo'),
                    'valorBase' => $this->request->getVar('valorBase'),
                'quantidade' => $this->request->getVar('quantidade'),
                );
            $produtoModel->insereProduto($data);
            return redirect()->to(base_url(''));
        }
    }
}
