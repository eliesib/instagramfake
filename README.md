# instagramfake con Laravel Sail
 Este es un proyecto hecho en Laravel 9.x en el cual simula a la popular red social de Instagram
## Previa
## Requisitos
- Docker

## Instalación
1. Primero clonamos este repositorio: 
``$ git clone https://github.com/eliesib/instagramfake/`` 
2. Ingresamos a la carpeta: ``$ cd instagramfake``
3. Ejecutamos: ``cp .env.example .env`` y configuramos nuestra base de datos
4. Ejecutamos key: ``$ php artisan key:generate``
5. Agregamos el bash de Laravel Sail:

    ``alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'``
    
    Iniciamos sail:
    
    ``$ sail up``
6. Instalamos e iniciamos npm: ``$ sail npm install && npm run dev``
8. Haremos la migracion de la base de datos con: 

    ``$ sail artisan migrate:fresh --seed``
    
    *(EL comando --seed lo asigno para agregar a la base de datos algunos datos por default tales como: usuarios, algunas imagenes y comentarios)*
    
Listo, ya deberias ingresar a la direccion que te fue dada al ejecutar el ``sail up``

Un usuario por defecto que agregamos con ``--seed`` para ingresar a instagramfake es:

- email: prueba@prueba.com
- contraseña: prueba
    
