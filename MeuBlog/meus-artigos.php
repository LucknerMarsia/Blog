<?php

require 'config.php';
include 'src/Artigo.php';

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Artigos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">

        <img class="imagem"  src="imagens blog/6.jpg">

        <h1>Meus Artigos</h1>
        <?php foreach ($artigos as $artigo) : ?>
        <h2>
            <a href="artigo.php?id=<?php echo $artigo['id']; ?>">
                <?php echo $artigo['titulo']; ?>
            </a>
        </h2>
        <h4>
            <?php echo nl2br($artigo['subtitulo']); ?>
        </h4>
        <?php endforeach; ?>
        <div>
            <br>
            <img class="imagem" src="imagens blog/24.jpg"> 
            <br>
            <br>   
            <a class="botaoindex" href="index.php">Home</a>
            <br>
            <br>
            <div>
                <a class="botaoadmin" href="../admin/">Administrar</a>
            </div>

        </div>
    </div>
</body>

</html>