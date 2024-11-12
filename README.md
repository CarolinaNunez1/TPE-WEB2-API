# TPE-WEB2-API

ENDPOINTS

GET -> /api/libros
por ejemplo http://localhost/TPE-WEB2-API/api/libros con GET me devuelve todos los libros

GET -> /api/autores
por ejemplo http://localhost/TPE-WEB2-API/api/autores con GET me devuelve todos los autores

GET -> /api/librosByAtr
por ejemplo http://localhost/TPE-WEB2-API/api/librosByAtr con GET me devuelve todos los libros ordenados por el tipo de libro

PUT-> http://localhost/TPE-WEB2-API/api/libros/1 
por ejemplo para PUT -> http://localhost/TPE-WEB2-API/api/updateBook presiono send y actualizo el libro con id 1.

PUT-> http://localhost/TPE-WEB2-API/api/autores/1 
por ejemplo para PUT -> http://localhost/TPE-WEB2-API/api/autores/1 presiono send y actualizo el autor con id 1.

GET -> /apilibrosPaginado?page=2&limit=2
por ejemplo http://localhost/TPE-WEB2-API/api/librosPaginado?page=2&limit=2 proporciona paginación para una lista de libros, el parámetro page indica la página que se desea obtener y el parámetro limit establece el número máximo de elementos que se mostrarán en cada página.