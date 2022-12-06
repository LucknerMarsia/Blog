<?php

require 'config.php';
require 'src/Artigo.php';

$obj_artigo = new Artigo($mysql);
$artigo = $obj_artigo->encontrarPorId($_GET['id']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Blog Notícias</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">

        <img class="imagem" src="data:image/jpeg;base64,<?= base64_encode($artigo['imagem2']) ?>" /> 

        <h1>
            <?php echo $artigo['titulo']; ?>
        </h1>
        <p>
            <?php echo nl2br($artigo['conteudo']); ?>
        </p>
        <p> 
            <img class="imagem" src="data:image/jpeg;base64,<?= base64_encode($artigo['imagem1']) ?>" />  
        </p>
        <div>
            <a class="botao botao-block" href="meus-artigos.php">Voltar</a>
        </div>
    </div>
</body>

</html>