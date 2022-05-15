<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\ProdutoModel;
use App\Models\vendaModel;

class Venda extends BaseController
{
    public function listagem()
    {
        $vendaModel = new vendaModel();
        $data['vendas'] = $vendaModel->getDados();
        return view('vendas/listagem', $data);
    }
    public function mostraCadastro()
    {
        $clienteModel = new ClienteModel();
        $data['clientes'] = $clienteModel->getDados();
        $produtoModel = new ProdutoModel();
        $data['produtos'] = $produtoModel->getDados();
        $data['operacao'] = 'cadastro';
        return view('vendas/cadastro', $data);
    }
    public function cadastra()
    {
        $rules = [
            'dataCompra' => 'required',
            'idCliente' => 'required',
        ];

        $vendaModel = new vendaModel();

        if ($this->validate($rules)) {
            $data = array(
                'observacao' => $this->request->getVar('observacao'),
                'dataCompra' => $this->request->getVar('dataCompra'),
                'idCliente' => $this->request->getVar('idCliente'),
                'idProduto' => $this->request->getVar('idProduto'),
                'valorUnitario' => $this->request->getVar('valorUnitario'),
                'quantidade' => $this->request->getVar('quantidade')
            );
            $vendaModel->insereVenda($data);
            return redirect()->to(base_url('/vendas/listagem'));
        }
    }

    public function deleta($id = null)
    {
            $vendaModel = new VendaModel();
            $vendaModel->deletaVenda($id);
            return redirect()->to(base_url('/vendas/listagem'));
        
    }

    public function mostraAlteracao($id = null)
    {
        if ($id != null) {
            $clienteModel = new ClienteModel();
            $data['clientes'] = $clienteModel->getDados();
            $produtoModel = new ProdutoModel();
            $data['produtos'] = $produtoModel->getDados();
            $vendaModel = new VendaModel();
            $data['venda'] = $vendaModel->getDados($id);
            $data['operacao'] = 'alteracao';
            return view('vendas/cadastro', $data);
        } else {
            return redirect()->to(base_url('/vendas/listagem'));
        }
    }

    public function mostraExibicao($id = null)
    {
        if ($id != null) {
            $clienteModel = new ClienteModel();
            $data['clientes'] = $clienteModel->getDados();
            $produtoModel = new ProdutoModel();
            $data['produtos'] = $produtoModel->getDados();
            $vendaModel = new VendaModel();
            $data['venda'] = $vendaModel->getDados($id);
            return view('vendas/exibir', $data);
        } else {
            return redirect()->to(base_url('/vendas/listagem'));
        }
    }

    public function altera($id)
    {
        $rules = [
            'dataCompra' => 'required',
            'idCliente' => 'required',
        ];
        $vendaModel = new VendaModel();

        if ($this->validate($rules)) {
            $data = array(
                'observacao' => $this->request->getVar('observacao'),
                'dataCompra' => $this->request->getVar('dataCompra'),
                'idCliente' => $this->request->getVar('idCliente'),
                'idProduto' => $this->request->getVar('idProduto'),
                'valorUnitario' => $this->request->getVar('valorUnitario'),
                'quantidade' => $this->request->getVar('quantidade')
            );
            $vendaModel->alteraVenda($id, $data);
            return redirect()->to(base_url('/vendas/listagem'));
        }
    }
}
