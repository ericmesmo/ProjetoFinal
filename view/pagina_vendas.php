<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Consulta de Vendas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consulta-venda {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
</head>
<body>
    <?php
        include_once("./include_menu.php");
        require_once("../dao/VendaDAO.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="card-consulta-venda">
                <div class="card">
                    <div class="card-header">
                        Consulta de Vendas
                    </div>
                    <div class="card-body">
                        <?php
                            $vendas = VendaDAO::buscarTodosJoin();
                            $retorno = Sessao::getInstance()->recuperar("AUTENTICACAO");
                            if (isset($vendas)){
                                foreach ($vendas as $venda) {
                                    if($retorno->getPerfil() == 2){
                                        if($retorno->getIdEmpresa() != $venda->getId()){
                                            continue;
                                        }
                                    }
                        ?>
                                    <div class="card mb-3 bg-light">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $venda->getIdEmpresa();?></h5>
                                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $venda->getIdCliente()?></h6>
                                            <p class="card-text"><?php echo $venda->getData();?> <br> <?php echo $venda->getDolar();?></p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                    <div class="card-footer">
                        <p class="text-right">Total: </span>
                        <div class="row mt-5">
                            <div class="col-12">
                                <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>