Ejercicio 4 (1p)

Revisa los ficheros de la carpeta database/migrations y contesta a las siguientes preguntas:

-¿Qué crees que hace el método create de la clase Schema?

-¿Qué crees que hace $table->string('email')->primary();?

-¿Cuantas tablas hay definidas? Indica el nombre de cada tabla

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
