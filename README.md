# instagramfake con Laravel 
 Este es un proyecto hecho en Laravel 9.x en el cual simula a la popular red social de Instagram
## Previa

## Instalación usando Sail 
- Requisitos: Docker

1. Primero clonamos este repositorio: ``$ git clone https://github.com/eliesib/instagramfake/`` 
2. Ingresamos a la carpeta: ``$ cd instagramfake``
3. Ejecutamos: ``cp .env.example .env``
4. Instalamos sail: php artisan sail:install y elegimos el servicio de preferencia
-(Opcional) Al instalar sail puedes abril .env con un editor y configurar tu base de datos a conveniencia 
-Si escoges un HOST diferente a mysql es obligatorio editarlo en .env y cambiar el HOST al que hayas escogido)
6. Ejecutamos key: ``$ php artisan key:generate``
7. Iniciamos sail:
    
    ``$ .vendor/bin/sail up``
8. Instalamos e iniciamos npm: ``$ ./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev``
9. Haremos la migracion de la base de datos con: 

    ``$ ./vendor/bin/sail artisan migrate``
    
    Y luego agregaremos unos datos a la base de datos por default tales como: usuarios, algunas imagenes y comentarios
    
     ``$ ./vendor/bin/sail artisan db:seed``
    
Listo, ya deberias ingresar a la direccion que te fue dada al ejecutar el ``sail up``

Un usuario por defecto que agregamos con ``--seed`` para ingresar a instagramfake es:

- email: prueba@prueba.com
- contraseña: prueba
    