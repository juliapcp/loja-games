<?php

namespace App\Controllers;

use App\Models\CategoriaGameModel;
use App\Models\CategoriaModel;
use App\Models\ProdutoModel;
use App\Models\VendaModel;

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
        $categoriaModel = new CategoriaModel();
        $data['categorias'] = $categoriaModel->getDados();
        return view('produtos/cadastro', $data);
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

            foreach ($this->request->getVar('idCategorias') as $categoriaProduto) {
                $data = array('idCategoria' => $categoriaProduto, 
                            'idGame'=> $id);
                $categoriaProdutoModel->insereCategoriaGame($data);
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
