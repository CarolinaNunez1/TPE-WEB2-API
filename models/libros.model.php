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
        $query=$this->db->prepare("SELECT * FROM libros");
        $query->execute();
        $libros= $query->fetchAll(PDO::FETCH_OBJ);
        
        return $libros;
    }

    public function getAllAuthorBook(){
        $query= $this->db->prepare("SELECT * FROM autores JOIN libros ON libros.id_autor=autores.id_autor ORDER BY libros.nombre_libro ASC");
        $query->execute();
        $libro= $query->fetchAll(PDO::FETCH_OBJ);

        return $libro;
    }

    public function getAllByAtributo($campo = 'id_libro', $orden = 'ASC') {
        // Lista de columnas permitidas
        $columnasPermitidas = ['id_libro', 'nombre_libro', 'tipo', 'sinopsis', 'anio', 'id_autor'];
    
        // Validación del campo
        if (!in_array($campo, $columnasPermitidas)) {
            $campo = 'id_libro'; // Por defecto
        }
    
        // Validación del orden
        $orden = strtoupper($orden);
        if ($orden !== 'ASC' && $orden !== 'DESC') {
            $orden = 'ASC'; // Por defecto
        }
    
        // Construir y ejecutar la consulta
        $query = $this->db->prepare("SELECT * FROM libros ORDER BY $campo $orden");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    

    public function getLibroById($id_libro) {
        $query = $this->db->prepare("SELECT * FROM libros WHERE id_libro = ?");
        $query->execute([$id_libro]);
        $libro = $query->fetch(PDO::FETCH_OBJ);
        return $libro;
    }
         

    public function updateBook($id_libro, $nombre_libro, $tipo, $sinopsis, $anio, $id_autor) {
        $query = $this->db->prepare("UPDATE libros SET nombre_libro = ?, tipo = ?, sinopsis = ?, anio = ?, id_autor = ? WHERE id_libro = ?");
        $query->execute([$nombre_libro, $tipo, $sinopsis, $anio, $id_autor, $id_libro]);
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