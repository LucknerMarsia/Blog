<?php

require '../config.php';
include '../src/Artigo.php';
require '../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['subtitulo'], $_POST['conteudo'], $_POST['imagem1'], $_POST['imagem2']);

    header('Location: /meus-artigos.php');
}

$artigo = new Artigo($mysql);
$art = $artigo->encontrarPorId($_GET['id']);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar-artigo.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $art['titulo']; ?>" />
            </p>
            <p>
                <label for="subtitulo">Digite o novo subtítulo do artigo</label>
                <textarea class="campo-form" type="text" name="subtitulo" id="titulo"><?php echo $art['subtitulo']; ?></textarea>
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo $art['conteudo']; ?></textarea>
            </p>
            <p>
                <label for="imagem1">Imagem do artigo</label>
                <input class="campo-form" type="file" name="imagem1" id="imagem1"/>
            </p>
            <p>
                <label for="imagem2">Imagem do artigo</label>
                <input class="campo-form" type="file" name="imagem2" id="imagem2"/>
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $art['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>