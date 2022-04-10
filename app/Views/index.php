<?php echo view('includes/head') ?>

<!-- Banner -->
<section class="main-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="banner-caption">
                                <h4>Bem vindo ao sistema gerencial <em>Geekplace</em>.</h4>
                                <span>CULTURA GEEK VINTAGE</span>
                                <p>No sistema de gerenciamento da <strong>Geekplace</strong> é possível registrar vendas, clientes, realizar inventários e ter insights com os analíticos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services -->
<section class="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="service-item first-item" onclick="location.href='/vendas';">
                    <div class="icon"></div>
                    <h4>Vendas</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-item second-item" onclick="location.href='/clientes';">
                    <div class="icon"></div>
                    <h4>Clientes</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-item third-item" onclick="location.href='/produtos';">
                    <div class="icon"></div>
                    <h4>Produtos</h4>
                </div>
            </div>
            <div class="col-md-3">
                <div class="service-item fourth-item" onclick="location.href='/categorias';">
                    <div class="icon"></div>
                    <h4>Categorias</h4>
                </div>
            </div>
            <div class="col-md-12">
                <div class="service-item fourth-item" onclick="location.href='/insights';">
                    <div class="icon"></div>
                    <h4>Insights</h4>
                </div>
            </div>
        </div>
    </div>
</section>



<?php echo view('includes/sidebar') ?>
<?php echo view('includes/footer') ?>