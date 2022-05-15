<?php

namespace App\Controllers;

use App\Models\CategoriaGameModel;
use App\Models\CategoriaModel;
use App\Models\ProdutoModel;
use App\Models\VendaModel;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Produto extends BaseController
{
    public function listagem()
    {
        $params   = $_SERVER['QUERY_STRING'];
        $produtoModel = new ProdutoModel();
        if($params == ""){
            $data['produtos'] = $produtoModel->getDados();
        } else {
            $data['produtos'] = $produtoModel->getDadosPelaDescricao(substr($params, (strrpos($params, "=") + 1)));
        }
        return view('produtos/listagem', $data);
    }
    public function mostraCadastro()
    {
        $categoriaModel = new CategoriaModel();
        $data['operacao'] = 'cadastro';
        $data['categorias'] = $categoriaModel->getDados();
        $data['operacao'] = 'cadastro';
        return view('produtos/cadastro', $data);
    }

    public function mostraAlteracao($id = null)
    {
        if ($id != null) {
            $categoriaModel = new CategoriaModel();
            $produtoModel = new ProdutoModel();
            $categoriaProdutoModel = new CategoriaGameModel();
            $data['categorias'] = $categoriaModel->getDados();
            $data['produto'] = $produtoModel->getDados($id);
            $data['categoriasSelecionadas'] = $categoriaProdutoModel->getCategoriasComProduto($id);
            $data['operacao'] = 'alteracao';
            return view('produtos/cadastro', $data);
        } else {
            return redirect()->to(base_url('/produtos/listagem'));
        }
    }

    public function mostraExibicao($id = null)
    {
        if ($id != null) {
            $categoriaModel = new CategoriaModel();
            $produtoModel = new ProdutoModel();
            $categoriaProdutoModel = new CategoriaGameModel();
            $data['categorias'] = $categoriaModel->getDados();
            $data['produto'] = $produtoModel->getDados($id);
            $data['categoriasSelecionadas'] = $categoriaProdutoModel->getCategoriasComProduto($id);
            return view('produtos/exibir', $data);
        } else {
            return redirect()->to(base_url('/produtos/listagem'));
        }
    }
    public function cadastra()
    {
        $rules = [
            'descricao' => 'required|max_length[100]',
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
                'quantidade' => $this->request->getVar('quantidade')
            );
            $id = $produtoModel->insereProduto($data);
            $categoriaProdutoModel = new CategoriaGameModel();

            if ($this->request->getVar('idCategorias') != null) {
                foreach ($this->request->getVar('idCategorias') as $categoriaProduto) {
                    $data = array(
                        'idCategoria' => $categoriaProduto,
                        'idGame' => $id
                    );
                    $categoriaProdutoModel->insereCategoriaGame($data);
                }
            }
            return redirect()->to(base_url('/produtos/listagem'));
        }
    }
    public function altera($id)
    {
        $rules = [
            'descricao' => 'required|max_length[100]',
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
                'quantidade' => $this->request->getVar('quantidade')
            );
            $produtoModel->alteraProduto($id, $data);
            $categoriaProdutoModel = new CategoriaGameModel();
            $categoriaProdutoModel->deletaCategoriaGamePeloGame($id);
            if ($this->request->getVar('idCategorias') != null) {
                foreach ($this->request->getVar('idCategorias') as $categoriaProduto) {
                    $data = array(
                        'idCategoria' => $categoriaProduto,
                        'idGame' => $id
                    );
                    $categoriaProdutoModel->insereCategoriaGame($data);
                }
            }
            return redirect()->to(base_url('/produtos/listagem'));
        }
    }
    public function deleta($id = null)
    {
        $vendaModel = new VendaModel();
        $vendasUsandoProduto = $vendaModel->getVendasComProduto($id);
        if ($vendasUsandoProduto == null) {
            $Produto = new ProdutoModel();
            $Produto->deletaProduto($id);
            return redirect()->to(base_url('/produto/listagem'));
        } else {
            $data['mensagem'] = "O produto não pode ser eliminado pois está em uso.";
            $data['url'] = base_url('/produto/listagem');
            return view('mensagem', $data);
        }
    }
}
