<?php
namespace Entity;

class Autor
{
    private int $id;
    private string $nombre;
    private string $apellidos;
    private string $nacionalidad;

    /**
     * @param int $id
     * @param string $nombre
     * @param string $apellidos
     * @param string $nacionalidad
     */
    public function __construct(int $id, string $nombre, string $apellidos, string $nacionalidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->nacionalidad = $nacionalidad;
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
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getNacionalidad(): string
    {
        return $this->nacionalidad;
    }

    /**
     * @param string $nacionalidad
     */
    public function setNacionalidad(string $nacionalidad): void
    {
        $this->nacionalidad = $nacionalidad;
    }




}