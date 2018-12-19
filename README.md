
# Pasos para la instalación

Luego de hacer clone del proyecto realizar los siguientes pasos:

- Crear base de datos desde el sql ubicado en database/files/digital_movies.sql
- Crear el archivo .env a partir de .env.example
- Agregar datos de la base de datos.
- Ejecutar composer install
- Ejecutar php artisan key:generate

Luego de ejecutado se puede iniciar el server de pruebas con:
```
$ php artisan serve
```

### Listado con Eloquent

La página de inicio  es:
http://localhost:8000/

Muestra el listado de películas con paginador, se uso Eloquent y la relación con genero para hacer el render. Adicional se agregaron como componentes el buscador y cada caja de película.

### Listado con API

Página de listado que consume películas del API creado, su ruta es:
http://localhost:8000/rest

Muestra una vista muy parecida a la anterior, con la diferencia que consume el servicio de listado de películas y jquery para mostrar cada película, adicional se agregó el paginado para este servicio.

### Servicios
El listado de servicios es el siguiente:

API:
|Method| Route                      | Descripción              |
|------|---------------------------------|--------------------------------------------------------------|
| GET  | /api/movies                     | Lista la primera página de peliculas, sin filtrado.          |
| GET  | /api/movies?page=2              | Lista las peliculas, en el páginado 2, sin filtrado.         |
| GET  | /api/movies?page=2&title=avatar | Lista las peliculas, en el páginado 2, con filtrado por titulo=avatar |
| GET  | /api/movies?title=avatar        | Lista las peliculas, en el páginado 1, con filtrado por titulo=avatar. |
| GET  | /api/movies/1                   | Obtiene la pelicula con id=1 |
| POST | /api/movies                     | Crea una pelicula |
| PUT  | /api/movies/1                   | Modifica una pelicula con el id=1 |

Ejemplo request para el POST y PUT:

```
{
"title": "Superman",
"rating": "7.3",
"awards": 0,
"release_date": "1978-05-25 00:00:00",
"length": 188,
"genre_id": 5
}
```  

Ejemplo response del POST:

```
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
```

Ejemplo response del PUT:

```
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
```

### Admin

El admin tiene acceso por medio de la url:
http://localhost:8000/admin

Mostrará una página de login para ingresar, las credenciales son:
 User: admin@test.com
 Pass: abc123

Aquí se puede ver el listado de películas, crearlas, editarlas y eliminarlas.

### Migration

Se agrega la columna de revenue en movies por medio del archivo de migración, en caso de que al instalar no se tenga se debe ejecutar :

```
php artisan migrate
```
