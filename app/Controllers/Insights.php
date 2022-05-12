<?php

namespace App\Controllers;

use App\Models\ClienteModel;
use App\Models\ProdutoModel;
use App\Models\vendaModel;

class Insights extends BaseController
{
    public function listagem()
    {
        $produtoModel = new ProdutoModel();
        $vendaModel = new VendaModel();
        $data['produtoMaisCaro'] = $produtoModel->getMaisCaro();
        $data['produtoMaiorQuantidade'] = $produtoModel->getEmMaisQuantidade();
        $data['clienteMaiorValorPago'] = $vendaModel->getClienteMaiorGasto();
        return view('insights/listagem', $data);
    }
    
}
