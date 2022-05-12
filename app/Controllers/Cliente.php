<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\VendaModel;

class Cliente extends BaseController
{
    public function listagem()
    {
        $clienteModel = new clienteModel();
        $data['clientes'] = $clienteModel->getDados();
        return view('clientes/listagem', $data);
    }
    public function mostraCadastro()
    {
        return view('clientes/cadastro');
    }
    public function cadastra()
    {
        $rules = [
            'nome' => 'required|min_length[3]|max_length[100]',
            'celular' => 'required',
            'email' => 'required'
        ];

        $clienteModel = new ClienteModel();

        if ($this->validate($rules)) {
            $data = array(
                'nome' => $this->request->getVar('nome'),
                'celular' => $this->request->getVar('celular'),
                'email' => $this->request->getVar('email')
            );
            $clienteModel->insereCliente($data);
            return redirect()->to(base_url('/clientes/listagem'));
        }
    }

    public function deleta($id = null)
    {
        $vendaModel = new VendaModel();
        $vendasUsandoCliente = $vendaModel->getVendasComCliente($id);
        if ($vendasUsandoCliente == null) {
            $cliente = new ClienteModel();
            $cliente->deletaCliente($id);
            return redirect()->to(base_url('/cliente/listagem'));
        } else {
            $data['mensagem'] = "O cliente não pode ser eliminado pois está em uso.";
            $data['url'] = base_url('/cliente/listagem');
            return view('mensagem', $data);
        }
    }
}
