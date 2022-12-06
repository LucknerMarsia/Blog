<?php

require '../config.php';
require '../src/Artigo.php';
require '../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->adicionar($_POST['titulo'], $_POST['subtitulo'], $_POST['conteudo'], $_POST['imagem1'], $_POST['imagem2']);

    header('Location: /meus-artigos.php');
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar-artigo.php" method="POST">
            <p>
                <label for="">Digite o título do artigo.</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o subtítulo do artigo.</label>
                <textarea class="campo-form" type="text" name="subtitulo" id="subtitulo"></textarea>
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo.</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <label for="">Adicione a 1° image.</label>
                <input class="campo-form" type="file" name="imagem1" id="imagem1"/>    
            </p>
            <p>
                <label for="">Adicione a 2° image.</label>
                <input class="campo-form" type="file" name="imagem2" id="imagem1"/>    
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>