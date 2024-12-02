# TPE-WEB2-API

ENDPOINTS

GET -> /api/libros
por ejemplo http://localhost/TPE-WEB2-API/api/libros con GET me devuelve todos los libros

GET -> /api/autores
por ejemplo http://localhost/TPE-WEB2-API/api/autores con GET me devuelve todos los autores

GET -> /api/librosByAtr
por ejemplo http://localhost/TPE-WEB2-API/api/librosByAtr?campo=nombre_libro&orden=ASC con GET me devuelve los libros por el campo opcional y el orden opcional que quiera

PUT-> http://localhost/TPE-WEB2-API/api/libros/1 
por ejemplo para PUT -> http://localhost/TPE-WEB2-API/api/updateBook presiono send y actualizo el libro con id 1.

PUT-> http://localhost/TPE-WEB2-API/api/autores/1 
por ejemplo para PUT -> http://localhost/TPE-WEB2-API/api/autores/1 presiono send y actualizo el autor con id 1.

GET -> /apilibrosPaginado?page=1&limit=5
por ejemplo http://localhost/TPE-WEB2-API/api/librosPaginado?page=2&limit=2 proporciona paginación para una lista de libros, el parámetro page indica la página que se desea obtener y el parámetro limit establece el número máximo de elementos que se mostrarán en cada página.