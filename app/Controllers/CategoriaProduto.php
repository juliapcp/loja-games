<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use App\Models\CategoriaGameModel;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CategoriaProduto extends BaseController
{
    public function listagem()
    {
        $categoriaProdutoModel = new CategoriaModel();
        $data['categoriasProduto'] = $categoriaProdutoModel->getDados();
        return view('categoriaProduto/listagem', $data);
    }
    public function mostraCadastro()
    {
        return view('categoriaProduto/cadastro');
    }
    public function cadastra()
    {
        $rules = [
            'descricao' => 'required|min_length[2]|max_length[100]',
        ];

        $categoriaProdutoModel = new CategoriaModel();

        if ($this->validate($rules)) {
            $data = array(
                'descricao' => $this->request->getVar('descricao')
            );
            $categoriaProdutoModel->insereCategoria($data);
            return redirect()->to(base_url('/categoriaProduto/listagem'));
        }
    }

    public function deleta($id = null)
    {
        $categoriaProdutoModel = new CategoriaGameModel();
        $produtosUsandoCategoria = $categoriaProdutoModel->getProdutosComCategoria($id);
        if ($produtosUsandoCategoria == null) {
            $categoria = new CategoriaModel();
            $categoria->deletaCategoria($id);
            return redirect()->to(base_url('/categoriaProduto/listagem'));
        }
    }
}
