<?php

class LibrosModel {
    public function __construct() {
        $this->db = $this->createConection();
    }

    Private function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'biblioteca';
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName , $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public function getAll(){
        $query=$this->db->prepare("SELECT * FROM libros ORDER BY DESC");
        $query->execute();
        $libros= $query->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function getBooksAndAuthors(){
        $query=$this->db->prepare("SELECT libros.nombre_libro AS NombreLibro, autores.nombre_autor AS Autor, libros.id_libro  FROM libros JOIN autores ON libros.id_autor=autores.id_autor ORDER BY autores.nombre_autor ASC");      
        $query->execute();
        $libros= $query->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function getAuthorBook(){
        $query= $this->db->prepare("SELECT autores.id_autor, libros.nombre_libro FROM autores JOIN libros ON libros.id_autor=autores.id_autor ORDER BY libros.nombre_libro ASC");
        $query->execute();
        $libro= $query->fetchAll(PDO::FETCH_OBJ);

        return $libro;
    }

    public function getAllByAtributo() {
        $query = $this->db->prepare("SELECT * FROM libros ORDER BY tipo DESC");
        $query->execute();
        $libros = $query->fetchAll(PDO::FETCH_OBJ);
        return $libros;
    }

    public function getLibroById($id_libro) {
        $query = $this->db->prepare("SELECT * FROM libros WHERE id_libro = ?");
        $query->execute([$id_libro]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return $libro;
    }
         

    public function updateBook($id_libro, $nombre_libro, $tipo, $sinopsis, $anio){
        $query = $this->db->prepare("UPDATE libros SET  nombre_libro = ?, tipo = ?, sinopsis = ?, anio = ? WHERE id_libro = ?");
        $query->execute([$nombre_libro, $tipo, $sinopsis, $anio, $id_libro]);
    }   
    

    public function getAllPaginado($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        // Preparamos la consulta con los parámetros LIMIT
        $query = $this->db->prepare("SELECT * FROM libros LIMIT :offset, :limit");
        
        // Asignamos valores a los parámetros usando bindValue
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->execute();

        $libros = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }
    
}