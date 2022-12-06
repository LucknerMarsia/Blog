<?php


class Artigo
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $titulo, string $subtitulo, string $conteudo, string $imagem, string $imagem2): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO artigos (titulo, subtitulo, conteudo, imagem1, imagem2) VALUES(?,?,?,?,?);');
        $insereArtigo->bind_param('sssss', $titulo, $subtitulo, $conteudo, $imagem, $imagem2);
        $insereArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM artigos WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT id, titulo, subtitulo, conteudo, imagem1, imagem2 FROM artigos');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, titulo, subtitulo, conteudo, imagem1, imagem2 FROM artigos WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    public function editar(string $id, string $titulo, string $subtitulo, string $conteudo, string $imagem, string $imagem2): void
    {
        $editaArtigo = $this->mysql->prepare('UPDATE artigos SET titulo = ?, subtitulo = ?, conteudo = ?, imagem1 = ?, imagem2 = ? WHERE id = ?');
        $editaArtigo->bind_param('ssssss', $titulo, $subtitulo, $conteudo, $imagem, $imagem2, $id);
        $editaArtigo->execute();
    }
}