Pasos para correr sistema laravel CRUD VIP2CARS

- XAMPP v3.2.2
- Composer 
1. Ejecutar composer install
2. Clonar repositorio https://github.com/Gian-08/vip2cars
3. cd vip2cars
cp .env.example .env   #para crear la conexion a la Base de datos
php artisan key:generate
4. Crear base de datos 'db_vipcars' en phpMyAdmin o importarlo se encuentra el la carpeta bd es un archivo .sql
5. Ejecutar php artisan migrate en la terminal
6. Luego para correr el proyecto ejecutar en la terminal php artisan serve
