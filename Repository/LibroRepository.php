<?php

namespace Repository;

use Entity\Libro;

require_once ('Database.php');


/**
 * @author: Manuel Gallardo Fuentes
 */
class LibroRepository
{
    /**
     * @var Database
     */
    private Database $db;

    /**
     * Función constructora.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @param Libro $libro
     * @return bool|null
     */
    public function create(Libro $libro): ?bool
    {
        $id = $libro->getId();
        $titulo = $libro->getTitulo();
        $f_publicacion = $libro->getFPublicacion();
        $id_autor = $libro->getId();

        $sql = ConfigDB::CREATE_BOOK . "('$id','$titulo','$f_publicacion', '$id_autor')";

        if ($this->db->getConnection()->query($sql)) {
            return true;
        }
        return null;
    }

    /**
     * @return array|false|null
     */
    public function listAll()
    {
        $result_set = $this->db->getConnection()->query(ConfigDB::LIST_BOOKS);
        return $result_set->fetch_assoc();
    }

    /**
     * @param $id
     * @return array|false|null
     */
    public function getBooksByAuthorId($id)
    {

        return $this->db->getConnection()->query(ConfigDB::GET_BOOK_BY_AUTHOR_ID . $id);


    }

    public function getBookById($id)
    {

        return $this->db->getConnection()->query(ConfigDB::GET_BOOK_BY_ID . $id);

    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        if ($this->db->getConnection()->query(ConfigDB::DELETE_BOOK_WHERE_ID . $id)) {
            echo '<script>console.log("Libro borrado")</script>';
            return true;
        }
        return false;
    }

    /**
     * @return int
     */
    public function getSize(): int {
        if($result = $this->db->getConnection()->query(ConfigDB::LIST_BOOKS)){
            $rowcount = mysqli_num_rows($result);
        }
        return $rowcount;
    }


}