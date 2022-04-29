<?php

namespace App\Controllers;

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
        return view('vendas/cadastro');
    }
    public function cadastra()
    {
        $rules = [
            'descricao' => 'required|min_length[3]|max_length[100]',
            'tipo' => 'required',
            'valorBase' => 'required',
            'quantidade' => 'required'
        ];

        $vendaModel = new vendaModel();

        if ($this->validate($rules)) {
            $data = array(
                'descricao' => $this->request->getVar('descricao'),
                'tipo' => $this->request->getVar('tipo'),
                'valorBase' => $this->request->getVar('valorBase'),
                'quantidade' => $this->request->getVar('quantidade'),
            );
            $vendaModel->inserevenda($data);
            return redirect()->to(base_url(''));
        }
    }
}
