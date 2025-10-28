<?php
session_start();

if(!isset($_SESSION["autenticado"]))
    {
        header("Location: /Bazar/login.html");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazar - Busca Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
    <script src="/bazar/buscaProduto.js"></script>
</head>
<body>
    <div class="container">
        <div style="text-align: right;">
            Usuário: <b><?= $_SESSION["autenticado"] ?></b>
        </div>
        
        <h1>Buscar Produto</h1>
        <div class="row">
            <div class="col-2">
                <label for="codigo" class="form-label">Código do Produto</label>
            </div>
            <div class="col-1">
                <input type="number" class="form-control" id="codigo">
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-primary" id="buscar">Buscar</button>
            </div>
        </div>

        <hr>

        <!-- Trecho de Exibição dos Detalhes do Produto -->
        <div class="row">
            <div class="col-2">Descrição:</div>
            <div class="col-4">
                <input type="text" id="descricao" class="form-control" disabled readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-2">Preço:</div>
            <div class="col-2">
                <input type="text" id="preco" class="form-control" disabled readonly>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalLabel">Bazar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="mensagemModal">Produto não existe</div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
        </div>
    </div>
</body>
</html>