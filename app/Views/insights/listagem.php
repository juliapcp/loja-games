<?php echo view('includes/head') ?>

<section class="services">
    <h3 style="text-align: center;"><b>Insights</b>.</h3>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="service-item first-item">
                    <div class="icon"></div>
                    <h4>Produto mais caro</h4>
                    <?php
                    if (isset($produtoMaiorQuantidade) && ($produtoMaiorQuantidade !== null)) {
                        foreach ($produtoMaisCaro as $produto) {
                            echo "<h3><b>" . $produto['descricao'] . "</b></h3>";
                            echo '<br>';
                            echo "<h5>R$: " . $produto['valorbase'] . ",00</h5>";
                        }
                    } else {
                        echo "<h3><b>-</b></h3>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item second-item">
                    <div class="icon"></div>
                    <h4>Produto em maior quantidade</h4>
                    <?php
                    if (isset($produtoMaiorQuantidade) && ($produtoMaiorQuantidade !== null)) {
                        foreach ($produtoMaiorQuantidade as $produto) {
                            echo "<h3><b>" . $produto['descricao'] . "</b></h3>";
                            echo '<br>';
                            echo "<h5>" . $produto['quantidade'] . " unidades</h5>";
                        }
                    } else {
                        echo "<h3><b>-</b></h3>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item third-item">
                    <div class="icon"></div>
                    <h4>Cliente com maior valor pago</h4>
                    <?php
                    if (isset($clienteMaiorValorPago) && ($clienteMaiorValorPago !== null)) {
                        foreach ($produtoMaiorQuantidade as $produto) {
                            echo "<h3><b>" . $produto['descricao'] . "</b></h3>";
                            echo '<br>';
                            echo "<h5>" . $produto['quantidade'] . " unidades</h5>";
                        }
                    } else {
                        echo "<h3><b>-</b></h3>";
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>
<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>