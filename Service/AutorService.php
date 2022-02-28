<?php

namespace Service;


use Repository\AutorRepository;
use Entity\Autor;

require('Repository/AutorRepository.php');


/**
 * @author: Manuel Gallardo Fuentes
 */
class AutorService
{

    /**
     * @var AutorRepository
     */
    private AutorRepository $repository;

    /**
     * Función constructora
     */
    public function __construct()
    {
        $this->repository = new AutorRepository();
    }

    /**
     * @param $id
     * @param $nombre
     * @param $apellidos
     * @param $nacionalidad
     * @return void
     */
    public function create($id, $nombre, $apellidos, $nacionalidad)
    {
        $creado = $this->repository->create(new Autor($id, $nombre, $apellidos, $nacionalidad));
        echo "No se ha podido crear este libro" ? $creado != true : $creado;
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
     * @param $id
     * @return void|null
     */
    public function getAuthorById($id)
    {
        if ($id == null) {
            $this->listAll();
        } else if (!is_numeric($id)) {
            return null;
        }
        else {
            $result_set = $this->repository->getAuthorById($id);
            $this->to_table($result_set);
        }

    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {

        if($this->repository->delete($id)) {
            echo 'El autor con id ' . $id . ' ha sido eliminado correctamente';
        } else {
            echo 'No se pudo encontrar el autor';
        }

    }

    /**
     * @param bool|array|null $result_set
     * @return void
     */
    public function to_table(bool|array|null $result_set): void
    {
        if($result_set!=null) {
            echo '<div style="margin: 20px; 
                              padding: 20px;
                              border: solid 2px black">';
            echo '<h3> ' . 'Autor' . '</h3>';
            $cabeceras = array("ID", "Nombre", "Apellidos", "Nacionalidad");
            $i = 0;
            foreach ($result_set as $result) {
                echo '<tr>';
                echo '<td>' . $cabeceras[$i] . ': ' . $result . '<br>' . '</td>';
                echo '</tr>';
                $i++;
            }
            echo '</div>';
        }
    }

    /**
     * @return int
     */
    public function getSize(): int {
        return $this->repository->getSize();
    }

}