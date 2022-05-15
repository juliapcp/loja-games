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
        $categoriaGameModel = new CategoriaGameModel();
        $data['categoriasProduto'] = $categoriaProdutoModel->getDados();
        $data['games'] = $categoriaGameModel->getProdutosCategorias();

        return view('categoriaProduto/listagem', $data);
    }
    public function mostraCadastro()
    {
        $data['operacao'] = 'cadastro';
        return view('categoriaProduto/cadastro', $data);
    }

    public function mostraAlteracao($id = null)
    {
        if ($id != null) {
            $categoriaModel = new CategoriaModel();
            $data['categoria'] = $categoriaModel->getDados($id);
            $data['operacao'] = 'alteracao';
            return view('categoriaProduto/cadastro', $data);
        } else {
            return redirect()->to(base_url('/categoriaProduto/listagem'));
        }
    }

    public function mostraExibicao($id = null)
    {
        if ($id != null) {
            $categoriaModel = new CategoriaModel();
            $data['categoria'] = $categoriaModel->getDados($id);
            return view('categoriaProduto/exibir', $data);
        } else {
            return redirect()->to(base_url('/categoriaProduto/listagem'));
        }
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
        } else {
            $data['mensagem'] = "A categoria não pode ser eliminada pois está em uso.";
            $data['url'] = base_url('/categoriaProduto/listagem');
            return view('mensagem', $data);
        }
    }
    public function altera($id)
    {
        $rules = [
            'descricao' => 'required|min_length[2]|max_length[100]',
        ];

        $categoriaModel = new CategoriaModel();

        if ($this->validate($rules)) {
            $data = array(
                'descricao' => $this->request->getVar('descricao')
            );
            $categoriaModel->alteraCategoria($id, $data);
            return redirect()->to(base_url('/categoriaProduto/listagem'));
        }
    }
}
