<?php

class AutoresModel {
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
        $sentencia=$this->db->prepare("SELECT * FROM autores ORDER BY nombre_autor ASC");
        $sentencia->execute([]);
        $autores= $sentencia->fetchAll(PDO::FETCH_OBJ);
        
        return $autores;
    }
    public function getAutorById($id_autor) {
        $query = $this->db->prepare("SELECT * FROM autores WHERE id_autor = ?");
        $query->execute([$id_autor]);
        $autor = $query->fetch(PDO::FETCH_OBJ);
        return $autor;
    }
    public function updateAuthor($id_autor, $nombre_autor, $nacimiento_autor, $nacionalidad_autor){
        $query = $this->db->prepare("UPDATE autores SET  nombre_autor = ?, nacimiento_autor = ?, nacionalidad_autor = ? WHERE id_autor = ?");
        $query->execute([$nombre_autor, $nacimiento_autor, $nacionalidad_autor, $id_autor]);
    }  
}