<?php

require_once 'models/autores.model.php';
require_once 'models/libros.model.php';
require_once 'views/api.view.php';



class PublicApiController{

    private $modelAutor;
    private $modelLibro;
    private $view;
    private $data;

    public function __construct() {
        $this->modelAutor =  new AutoresModel();
        $this->modelLibro =  new LibrosModel();
        $this->view = new APIView();
        $this->data= file_get_contents("php://input"); //Devuelve a string
    }

    public function getdata(){
        return json_decode($this->data); //Convierte el string en JSON
    }

    public function getAllAuthors($params = []) {
        $autores = $this->modelAutor->getAll();
        if ($autores){
            $this->view->response($autores, 200);
        }else{
            $this->view->response($autores, 404);
        }
    }

    public function getAllBooks($params = []){
        $libros = $this->modelLibro->getAll();
        if ($libros){
            $this->view->response($libros, 200);
        }else{
            $this->view->response($libros, 404);
        }
    }
    
    public function getAllByAtributo($params = null) {
        // Leer parámetros de la consulta (opcional)
        $campo = $_GET['campo'] ?? 'id_libro';
        $orden = $_GET['orden'] ?? 'ASC';
    
        // Obtener los libros desde el modelo
        try {
            $libros = $this->modelLibro->getAllByAtributo($campo, $orden);
    
            if (!empty($libros)) {
                $this->view->response($libros, 200);
            } else {
                $this->view->response("No se encontraron libros.", 404);
            }
        } catch (Exception $e) {
            $this->view->response("Error interno del servidor: " . $e->getMessage(), 500);
        }
    }
    
    
    public function getLibroById($params) {
        $idLibro = $params[':ID'];
        $libro = $this->modelLibro->getLibroById($idLibro);
        
        if ($libro) {
            $this->view->response($libro, 200); // Devuelve el libro encontrado
        } else {
            $this->view->response("Libro no encontrado", 404); // Devuelve 404 si no se encuentra el libro
        }
    }   

    public function getAutorById($params) {
        $idAutor = $params[':ID'];
        $autor = $this->modelAutor->getAutorById($idAutor);
        
        if ($autor) {
            $this->view->response($autor, 200); // Devuelve el autor encontrado
        } else {
            $this->view->response("Autor no encontrado", 404); // Devuelve 404 si no se encuentra el autor
        }
    }

    public function updateBook($params = null) {
        $id_libro = $params[':ID'];
        
        // Lee el cuerpo de la solicitud
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null) {
            $this->view->response("Error al decodificar JSON o JSON vacío", 400);
            return;
        }

        // Verifica si los campos requeridos están presentes
        if (
            !isset($data['nombre_libro']) ||
            !isset($data['tipo']) ||
            !isset($data['sinopsis']) ||
            !isset($data['anio'])||
            !isset($data['id_autor'])
        ) {
            $this->view->response("Campos incompletos", 400);
            return;
        }

        $nombre_libro = $data['nombre_libro'];
        $tipo = $data['tipo'];
        $sinopsis = $data['sinopsis'];
        $anio = $data['anio'];
        $id_autor = $data['id_autor'];
        
        $libro = $this->modelLibro->getLibroById($id_libro);
        
        if ($libro) {
            $this->modelLibro->updateBook($id_libro, $nombre_libro, $tipo, $sinopsis, $anio, $id_autor);
            $this->view->response("El libro fue modificado correctamente", 200);
        } else {
            $this->view->response("El libro con el id=$id_libro no existe", 404);
        }
    }

    public function updateAuthor($params = null) {
        $id_autor = $params[':ID'];
        
        // Lee el cuerpo de la solicitud
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if ($data === null) {
            $this->view->response("Error al decodificar JSON o JSON vacío", 400);
            return;
        }

        // Verifica si los campos requeridos están presentes
        if (
            !isset($data['nombre_autor']) ||
            !isset($data['nacimiento_autor']) ||
            !isset($data['nacionalidad_autor'])
        ) {
            $this->view->response("Campos incompletos", 400);
            return;
        }

        $nombre_autor = $data['nombre_autor'];
        $nacimiento_autor = $data['nacimiento_autor'];
        $nacionalidad_autor = $data['nacionalidad_autor'];
        
        $autor = $this->modelAutor->getAutorById($id_autor);
        
        if ($autor) {
            $this->modelAutor->updateAuthor($id_autor, $nombre_autor, $nacimiento_autor, $nacionalidad_autor);
            $this->view->response("El autor fue modificado correctamente", 200);
        } else {
            $this->view->response("El autor con el id=$id_autor no existe", 404);
        }
    }

    public function getAllPaginado($params) {
        // Obtener los parámetros 'page' y 'limit' de la URL, con valores predeterminados
        $page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0 ? $_GET['limit'] : 10;
        $libros = $this->modelLibro->getAllPaginado($page, $limit);
        
        // Verificar si se encontraron libros
        if ($libros) {
            $this->view->response($libros, 200);
        } else {
            $this->view->response(["message" => "No books found for the requested page."], 404);
        }
    }
    

}