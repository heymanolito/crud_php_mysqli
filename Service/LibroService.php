<?php

namespace Service;

use Repository\LibroRepository;
use Entity\Libro;

require ('Repository/LibroRepository.php');

/**
 * @author: Manuel Gallardo Fuentes
 */
class LibroService
{

    /**
     * @var LibroRepository
     */
    private LibroRepository $repository;

    /**
     * Función constructora
     */
    public function __construct()
    {

        $this->repository = new LibroRepository();
    }

    /**
     * @param $id
     * @param $titulo
     * @param $f_publicacion
     * @param $id_autor
     * @return void
     */
    public function create($id, $titulo, $f_publicacion, $id_autor) {
        $creado = $this->repository->create(new Libro($id, $titulo, $f_publicacion, $id_autor));
        echo "No se ha podido crear este libro" ? $creado!=true : $creado;
    }

    /**
     * @return void
     */
    public function listAll()
    {
        $result_set = $this->repository->listAll();
        $this->to_table($result_set);
    }

    /**
     * @param int $id
     * @return void|null
     */
    public function getBooksByAuthorId(int $id)
    {
        if ($id == null) {
            $this->listAll();
        } else if (!is_numeric($id)) {
            return null;
        }
        else {
            $result_set = $this->repository->getBooksByAuthorId($id);
            $this->to_table($result_set);
        }
    }

    public function getBookById(int $id)
    {
        if ($id == null) {
            $this->listAll();
        } else if (!is_numeric($id)) {
            return null;
        }
        else {
            $result_set = $this->repository->getBookById($id);
            $this->to_table($result_set);
        }
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {
        if($this->repository->delete($id)) {
            echo 'El libro con id ' . $id . 'ha sido eliminado correctamente';
        } else {
            echo 'No se pudo encontrar el autor';
        }
    }

    /**
     * @param int $id
     * @return int
     */
    public function getBooksByAuthorIdSize(int $id): int {
        return $this->getBooksByAuthorIdSize($id);
    }

    /**
     * @param bool|array|null $result_set
     * @return void
     */
    public function to_table($result_set): void
    {
        if($result_set!=null) {
            echo '<div style="margin: 20px; 
                              padding: 20px;
                              border: solid 2px black">';
            echo '<h3> ' . 'Libros publicados' . '</h3>';
            while($row = mysqli_fetch_row($result_set)) {
                echo '<td><li>' . $row[1] . '<br>' . '</li></td>';
            }
            echo '</div>';
        }
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->repository->getSize();
    }
}