<?php
namespace Entity;

class Libro
{
    private int $id;
    private string $titulo;
    private string $f_publicacion;
    private int $id_autor;

    /**
     * @param int $id
     * @param string $titulo
     * @param string $f_publicacion
     * @param int $id_autor
     */
    public function __construct(int $id, string $titulo, string $f_publicacion, int $id_autor)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->f_publicacion = $f_publicacion;
        $this->id_autor = $id_autor;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getFPublicacion(): string
    {
        return $this->f_publicacion;
    }

    /**
     * @param string $f_publicacion
     */
    public function setFPublicacion(string $f_publicacion): void
    {
        $this->f_publicacion = $f_publicacion;
    }

    /**
     * @return int
     */
    public function getIdAutor(): int
    {
        return $this->id_autor;
    }

    /**
     * @param int $id_autor
     */
    public function setIdAutor(int $id_autor): void
    {
        $this->id_autor = $id_autor;
    }


}