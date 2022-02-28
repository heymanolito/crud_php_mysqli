<?php

namespace Repository;

use Entity\Autor;

require_once ('Database.php');


/**
 * @author: Manuel Gallardo Fuentes
 */
class AutorRepository
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
        echo '<script>console.log("Dentro de AutorRepository")</script>';
        $this->db = new Database();
    }

    /**
     * @param Autor $autor
     * @return bool|null
     */
    public function create(Autor $autor): ?bool
    {
        $id = $autor->getId();
        $nombre = $autor->getNombre();
        $apellidos = $autor->getApellidos();
        $nacionalidad = $autor->getNacionalidad();

        $sql = ConfigDB::CREATE_AUTHOR . "('$id','$nombre','$apellidos', '$nacionalidad')";

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
        $result_set = $this->db->getConnection()->query(ConfigDB::LIST_AUTHORS);
        return $result_set->fetch_assoc();
    }

    /**
     * @param $id
     * @return array|false|null
     */
    public function getAuthorById($id)
    {
        if (is_numeric($id)) {
            $result_set = $this->db->getConnection()->query(ConfigDB::GET_AUTHOR_BY_ID . $id);
        } else {
            return null;
        }

        return $result_set->fetch_assoc();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->checkTransaction(ConfigDB::DELETE_BOOK_WHERE_AUTHOR_ID . $id,
            ConfigDB::DELETE_AUTHOR_WHERE_ID . $id);
    }

    /**
     * @return int
     */
    public function getSize(): int {
        if($result = $this->db->getConnection()->query(ConfigDB::LIST_AUTHORS)){
            $rowcount = mysqli_num_rows($result);
        }
        return $rowcount;
    }

    /**
     * @param string $sql_borrarLibros
     * @param string $sql_borrarAutor
     * @return bool
     */
    private function checkTransaction(string $sql_borrarLibros, string $sql_borrarAutor): bool
    {
        $this->db->getConnection()->autocommit(false);
        $this->db->getConnection()->begin_transaction();

        if ($this->db->getConnection()->query($sql_borrarLibros)
            && $this->db->getConnection()->query($sql_borrarAutor)) {
            $this->db->getConnection()->commit();
            echo '<script>console.log("Autor y libros borrados.")</script>';
            return true;
        } else {
            $this->db->getConnection()->rollback();
            $this->db->getConnection()->autocommit(true);
            $this->db->getConnection()->close();
            echo '<script>console.log("Ha habido un error.")</script>';
            return false;
        }
    }
}