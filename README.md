# instagramfake con Laravel 
 Este es un proyecto hecho en Laravel 9.x en el cual simula a la popular red social de Instagram
## Previa

## Instalacion
1. Primero clonamos este repositorio: ``$ git clone https://github.com/eliesib/instagramfake/`` 
2. Ingresamos a la carpeta: ``$ cd instagramfake``

Desde aquí podemos usar 2 metodos para colocarlo en marcha de manera local, la primera es usando el comando del mismo laravel como artisan, o tambien podemos crear una imagen en Docker usando sail (Este viene incluido en todo los proyectos hechos en laravel)

### Primer metodo:
Requisitos: 
- Nodejs
- PHP 8.0 +
- Gestor de bases de datos SQL de nuestra preferencia

1. Instalamos el paquete npm ``install``
2. Generamos la key del proyecto ``php artisan key:install"
3. Generamos archivo .env: ``cp .env.example .env`` 
4. Creamos una nueva base de datos vacia (Por ejm, con el nombre test)
5. En el archivo .env editamos los valores DB_DATABASE, DB_USERNAME y DB_PASSWORD. Que usemos para hacer la conexión a la base de datos (En este caso DB_DATABASE = test)
6. Migramos y asignamos algunos valores a nuestra bases de datos: ``php artisan migrate --seed`` 
7. Iniciamos el server: `` php artisan serve `` 
8. Iniciamos npm: `` npm run dev `` 



### Segundo metodo con Sail
- Requisitos: Docker

1. Instalamos sail: php artisan sail:install y elegimos el servicio de preferencia
-(Opcional) Al instalar sail puedes abril .env con un editor y configurar tu base de datos a conveniencia 
-Si escoges un HOST diferente a mysql es obligatorio editarlo en .env y cambiar el HOST al que hayas escogido)
2. Ejecutamos key: ``$ php artisan key:generate``
3. Iniciamos sail:
    
    ``$ .vendor/bin/sail up``
4. Instalamos e iniciamos npm: ``$ ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev``
5. Haremos la migracion de la base de datos y asignamos algunos valores con: 
    
     ``$ ./vendor/bin/sail artisan migrate --seed``
    
Listo, ya deberias ingresar a la direccion que te fue dada al ejecutar el ``sail up``

## Ingresar a instagramfake

Un usuario por defecto que agregamos con ``--seed`` para ingresar a instagramfake es:

- email: prueba@prueba.com
- contraseña: prueba

Tambien es posible crear un nuevo usuario, dando clic en Sign up
    
