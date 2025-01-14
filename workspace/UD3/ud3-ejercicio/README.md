# Way of Working(3.2Modelos en laravel):
### 1. Clonar el repositorio:
-git clone https://github.com/IvanGallego13/ud3_ejercicio.git
-cd ud3_ejercicio

### 2. Configurar Laravel:

-composer install -n --prefer-dist
-cp .env.example .env

Edita el archivo .env para configurar la conexión con la base de datos:

-DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3307(si te dice que esta ocupado puedes cambiarlo a cualquier otro)
DB_DATABASE=gestion_notas
DB_USERNAME=root
DB_PASSWORD=m1_s3cr3t

-php artisan key:generate

### 3. Crear el contenedor de MariaDB:

-docker build -t mariadb-server .
-docker run -d --name mariadb-server -p 3307:3306 -e MYSQL_ROOT_PASSWORD=m1_s3cr3t mariadb-server(recordar que se puedes tener otro contenedor con el mismo nombre o con el mismo puerto, asegurate de cambiarlo tambien en el .env)

Comprueba que el contenedor esté corriendo:

-docker ps -a

Accede al contenedor para crear la base de datos inicial:

-docker exec -it mariadb-server mariadb -u root -p

Introducir contraseña: m1_s3cr3t

-CREATE DATABASE gestion_notas;

### 4. Ejecutar migraciones

-php artisan config:clear

-php artisan migrate

Verifica las tablas creadas:

docker exec -it mariadb-server mariadb -u root -p

Introducir contraseña: m1_s3cr3t

USE gestion_notas;

SHOW TABLES;

### 5. Añadir datos con Seeders:

-php artisan db:seed --class=AsignaturasTableSeeder

-php artisan db:seed --class=AlumnosTableSeeder

-php artisan db:seed --class=NotasTableSeeder

(PARA MIGRAR TODO HACER: php artisan migrate --seed)

Verifica los datos insertados en la base de datos:

docker exec -it mariadb-server mariadb -u root -p

Introducir contraseña: m1_s3cr3t

USE gestion_notas;

SELECT * FROM alumnos;

-Prueba esto para ver si estan las routas de api bien: php artisan route:list --verbose


### 6. Desplegar el entorno de desarrollo, levanta el servidor de desarrollo de Laravel:

-php artisan serve

(Accede a la aplicación desde el navegador en http://127.0.0.1:8000.)

### -El ejercicio 5 es Gestion_Notas_IGO.postman_collection.json

## IMPORTANTE:(3.1 Introduccion a Eloquent)
Esta es mi conexion a la base de datos(.env):
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=gestion_notas
DB_USERNAME=root
DB_PASSWORD=m1_s3cr3t

Y tambien mi container_name es mariadb-server1 y el puerto "3307:3306"

Ejercicio 4 (1p)

Revisa los ficheros de la carpeta database/migrations y contesta a las siguientes preguntas:

-¿Qué crees que hace el método create de la clase Schema?
  +El metodo create se utiliza para crear una nueva tabla en la base de datos.

-¿Qué crees que hace $table->string('email')->primary();?
  +Esta linea define la columna de email de tipo string en la tabla, y la pone como clave primaria.
  
-¿Cuantas tablas hay definidas? Indica el nombre de cada tabla
  +users
  +password_reset_tokens
  +sessions
  +cache
  +cache_locks
  +jobs
  +job_batches
  +failed_jobs

Ejercicio 5 (1p)

-¿Cuántas tablas aparecen?

MariaDB [test1]> SHOW TABLES;
+-----------------------+
| Tables_in_test1       |
+-----------------------+
| cache                 |
| cache_locks           |
| failed_jobs           |
| job_batches           |
| jobs                  |
| migrations            |
| password_reset_tokens |
| sessions              |
| users                 |
+-----------------------+
9 rows in set (0.001 sec)


Ejercicio 6 (1p)

Indica qué realiza los siguientes comandos:

-php artisan migrate:  INFO  Nothing to migrate.

-php artisan migrate:status: Migration name .......................................... Batch / Status  
  0001_01_01_000000_create_users_table ........................... [1] Ran  
  0001_01_01_000001_create_cache_table ........................... [2] Ran  
  0001_01_01_000002_create_jobs_table ............................ [2] Ran 

-php artisan migrate:rollback:    INFO  Rolling back migrations.  

  0001_01_01_000002_create_jobs_table ....................... 55.68ms DONE
  0001_01_01_000001_create_cache_table ...................... 33.48ms DONE

-php artisan migrate:reset: INFO  Rolling back migrations.  

  0001_01_01_000000_create_users_table ...................... 58.11ms DONE

-php artisan migrate:refresh: INFO  Nothing to rollback.  

   INFO  Running migrations.  

  0001_01_01_000000_create_users_table ..................... 151.01ms DONE
  0001_01_01_000001_create_cache_table ...................... 27.67ms DONE
  0001_01_01_000002_create_jobs_table ...................... 145.04ms DONE

-php artisan make:migration: What should the migration be named? ─────────────────────────┐
 │ E.g. create_flights_table  

-php artisan migrate --seed: INFO  Nothing to migrate.  

   INFO  Seeding database. 

Ejercicio 7 (1p)

MariaDB [test2]> SHOW TABLES;
+-----------------------+
| Tables_in_test2       |
+-----------------------+
| alumnos               |
| cache                 |
| cache_locks           |
| failed_jobs           |
| job_batches           |
| jobs                  |
| migrations            |
| password_reset_tokens |
| sessions              |
| users                 |
+-----------------------+
10 rows in set (0.000 sec)

Ejercicio 8 (1p)
  +1.Crear la migración: php artisan make:migration add_apellido_to_alumnos_table --table=alumnos
  +2.Editar la migración: añadir el campo apellido en up() y eliminarlo en down().
  +3.Ejecutar la migración: php artisan migrate
  +4.Verificar la tabla: DESCRIBE alumnos; en MariaDB.
  
Ejercicio 9 (1p)

Database changed
MariaDB [test2]> SELECT * FROM alumnos;
+----+------------------+----------------------------+---------------------+---------------------+
| id | nombre           | email                      | created_at          | updated_at          |
+----+------------------+----------------------------+---------------------+---------------------+
|  1 | Juan Pérez       | juan.perez@example.com     | 2025-01-07 16:21:00 | 2025-01-07 16:21:00 |
|  2 | María González   | maria.gonzalez@example.com | 2025-01-07 16:21:00 | 2025-01-07 16:21:00 |
|  3 | Carlos López     | carlos.lopez@example.com   | 2025-01-07 16:21:00 | 2025-01-07 16:21:00 |
+----+------------------+----------------------------+---------------------+---------------------+
3 rows in set (0.001 sec)

MariaDB [test2]> exit


Ejercicio 10 (1p)

Database changed
MariaDB [gestion_notas]> 
MariaDB [gestion_notas]> SELECT * FROM alumnos;
+----+------------------+----------------------------+---------------------+---------------------+
| id | nombre           | email                      | created_at          | updated_at          |
+----+------------------+----------------------------+---------------------+---------------------+
|  1 | Juan Pérez       | juan.perez@example.com     | 2025-01-07 16:38:59 | 2025-01-07 16:38:59 |
|  2 | María González   | maria.gonzalez@example.com | 2025-01-07 16:38:59 | 2025-01-07 16:38:59 |
+----+------------------+----------------------------+---------------------+---------------------+
2 rows in set (0.001 sec)

MariaDB [gestion_notas]> SELECT * FROM asignaturas;
+----+------------------+-----------------------------------+---------------------+---------------------+
| id | nombre           | descripcion                       | created_at          | updated_at          |
+----+------------------+-----------------------------------+---------------------+---------------------+
|  1 | Matemáticas      | Asignatura de matemáticas         | 2025-01-07 16:38:59 | 2025-01-07 16:38:59 |
|  2 | Lengua Española  | Asignatura de lengua y literatura | 2025-01-07 16:38:59 | 2025-01-07 16:38:59 |
+----+------------------+-----------------------------------+---------------------+---------------------+
2 rows in set (0.000 sec)

MariaDB [gestion_notas]> SELECT * FROM notas;
+----+-----------+---------------+------+---------------------+---------------------+
| id | alumno_id | asignatura_id | nota | created_at          | updated_at          |
+----+-----------+---------------+------+---------------------+---------------------+
|  1 |         1 |             1 | 8.50 | 2025-01-07 16:38:59 | 2025-01-07 16:38:59 |
|  2 |         2 |             2 | 9.00 | 2025-01-07 16:38:59 | 2025-01-07 16:38:59 |
+----+-----------+---------------+------+---------------------+---------------------+
2 rows in set (0.001 sec)

MariaDB [gestion_notas]> exit
