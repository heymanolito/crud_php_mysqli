<?php

namespace Repository;


/**
 * @author: Manuel Gallardo Fuentes
 */
class ConfigDB
{
    //CONFIG
    public const HOST = 'heroku_88216c9d82a2500';
    public const USERNAME = 'b336176d2bc7ea'; //root
    public const PASSWORD = '1fbc7ac5'; //root
    public const DB_NAME = 'libros'; //id18536218_libros
    public const LIBRO = 'libro';
    public const AUTOR = 'autor';

    //CREATE
    public const CREATE_AUTHOR = "INSERT INTO " . ConfigDB::DB_NAME . '.' . ConfigDB::AUTOR . 'VALUES ';
    public const CREATE_BOOK = "INSERT INTO " . ConfigDB::DB_NAME . '.' . ConfigDB::LIBRO . 'VALUES ';

    //READ
    public const LIST_AUTHORS = "SELECT * FROM " . ConfigDB::DB_NAME . '.' . ConfigDB::AUTOR;
    public const LIST_BOOKS = "SELECT * FROM " . ConfigDB::DB_NAME . '.' . ConfigDB::LIBRO;

    public const GET_AUTHOR_BY_ID =  "SELECT * FROM "
    . ConfigDB::DB_NAME . '.'
    . ConfigDB::AUTOR
    . " WHERE id = ";

    public const GET_BOOK_BY_AUTHOR_ID =  "SELECT * FROM "
    . ConfigDB::DB_NAME . '.'
    . ConfigDB::LIBRO
    . " WHERE id_autor = ";
    //DELETE

    public const DELETE_BOOK_WHERE_AUTHOR_ID =  "DELETE FROM "
    . ConfigDB::DB_NAME . '.'
    . ConfigDB::AUTOR
    . " WHERE id_autor = ";

    public const DELETE_BOOK_WHERE_ID = "DELETE FROM "
    . ConfigDB::DB_NAME . '.'
    . ConfigDB::LIBRO
    . " WHERE id = ";

    public const DELETE_AUTHOR_WHERE_ID = "DELETE FROM "
    . ConfigDB::DB_NAME . '.'
    . ConfigDB::LIBRO
    . " WHERE id = ";

    //OTHER


}