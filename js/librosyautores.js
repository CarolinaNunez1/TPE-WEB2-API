"use strict";

let id = document.querySelector("#administrador") ? document.querySelector("#administrador").value : null;

let app = new Vue({
    el: "#app",
    data: {
        libros: [],
        autores: [],
        admin: id
    },
    methods: {
        // Función para cargar libros y autores al iniciar la página
        getBooksAndAuthors: function() {
            // Obtener los libros
            fetch('api/libros')
                .then(response => response.json())
                .then(libros => {
                    this.libros = libros;
                })
                .catch(error => console.log(error));

            // Obtener los autores
            fetch('api/autores')
                .then(response => response.json())
                .then(autores => {
                    this.autores = autores;
                })
                .catch(error => console.log(error));
        },
        
        // Función para actualizar el libro y el autor
        updateBookAndAuthor: function(bookId, authorId, newBookName, newAuthorName) {
            this.updateBook(bookId, newBookName);
            this.updateAuthor(authorId, newAuthorName);
        },
        
        // Función para actualizar un libro
        updateBook: function(bookId, newBookName) {
            // Verificar si los datos son correctos
            const data = { nombre_libro: newBookName };
            console.log("Enviando datos del libro:", data); // Depurar el cuerpo que se envía

            fetch(`api/libro/${bookId}`, {
                method: 'PUT',
                headers: {'Content-Type': 'application/json'},  // Aquí indicamos que es JSON
                body: JSON.stringify(data) // Convertimos los datos a JSON
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la actualización del libro');
                }
                return response.json();
            })
            .then(data => {
                console.log('Libro actualizado:', data);
                this.getBooksAndAuthors(); // Refrescar lista de libros y autores
            })
            .catch(error => console.log('Error:', error));
        },
        
        // Función para actualizar un autor
        updateAuthor: function(authorId, newAuthorName) {
            const data = { nombre_autor: newAuthorName };
            console.log("Enviando datos del autor:", data); // Depurar el cuerpo que se envía

            fetch(`api/autor/${authorId}`, {
                method: 'PUT',
                headers: {'Content-Type': 'application/json'},  // Aquí indicamos que es JSON
                body: JSON.stringify(data) // Convertimos los datos a JSON
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error en la actualización del autor');
                }
                return response.json();
            })
            .then(data => {
                console.log('Autor actualizado:', data);
                this.getBooksAndAuthors(); // Refrescar lista de libros y autores
            })
            .catch(error => console.log('Error:', error));
        }
    },
    
    mounted() {
        this.getBooksAndAuthors();
    }
});

