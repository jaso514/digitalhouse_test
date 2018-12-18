Pasos para la instalación

Crear el archivo .env a partir de .env.example
Agregar datos de la base de datos.
Ejecutar composer install
Ejecutar php artisan key:generate

Ejecutar en la BD:
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1, 'admin', 'admin@test.com', '$2y$10$gOMwCbwJay.tk6lkmo6sYeO0laQDlyMJsdXHs4VbtODZNy4Uo6o4m', NULL, NULL, NULL);

API:

GET    |  /api/movies                        |    Lista la primera página de peliculas, sin filtrado.
GET    |  /api/movies?page=2                 |    Lista las peliculas, en el páginado 2, sin filtrado.
GET    |  /api/movies?page=2&title=avatar    |    Lista las peliculas, en el páginado 2, con filtrado por titulo=avatar.
GET    |  /api/movies?title=avatar           |    Lista las peliculas, en el páginado 1, con filtrado por titulo=avatar.
GET    |  /api/movies/1                      |    Obtiene la pelicula con id=1
POST   |  /api/movies                        |    Crea una pelicula
PUT    |  /api/movies/1                      |    Modifica una pelicula con el id=1

Ejemplo request para el POST y PUT:
{
"title": "Superman",
"rating": "7.3",
"awards": 0,
"release_date": "1978-05-25 00:00:00",
"length": 188,
"genre_id": 5
}

Ejemplo response del POST:
{
    "success": true,
    "message": "",
    "data": {
        "awards": 0,
        "title": "Superman",
        "rating": "7.3",
        "release_date": "1978-05-25 00:00:00",
        "length": 188,
        "updated_at": "2018-12-18 19:31:05",
        "created_at": "2018-12-18 19:31:05",
        "id": 22
    }
}

Ejemplo response del PUT:
{
    "success": true,
    "message": "",
    "data": {
        "id": 22,
        "created_at": "2018-12-18 19:31:05",
        "updated_at": "2018-12-18 20:08:44",
        "title": "Superman",
        "rating": "7.3",
        "awards": 0,
        "release_date": "1978-05-25 00:00:00",
        "length": 188,
        "genre_id": 5
    }
}