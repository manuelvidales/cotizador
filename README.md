<p align="center"><img src="https://i.ibb.co/PCk8nmb/login.png" width="540"></p>
<p align="center"><img src="https://i.ibb.co/0MrDmnf/home-01.png" width="540"></p>
<p align="center"><img src="https://i.ibb.co/wNbvZxX/archvos.png" width="640"></p>
<p align="center"><img src="https://i.ibb.co/JkYVydG/cotizador-01.png" width="640"></p>
<p align="center"><img src="https://i.ibb.co/fSYYFLn/cotizador-02.png" width="640"></p>
<p align="center"><img src="https://i.ibb.co/k2bmHkQ/panel-admin.png" width="580"></p>

## Descripcion

Sitio web para que al ingresar valores pueda calcular cuotas y precio final, desde un Archivo en Excel:

    - 1.-login
    - 2.-Registrarse

(1) ingreso al sistema, (2) Registro de nuevos usuarios al registrarse no tienen acceso a los menus hasta que el Administrador otorge algun Rol de 3 como: a)Admin, b)Manager y c)User.

    - 1.-Sistema
    - 2.-Archivos
    - 3.-Cotizador

Este sistema cuenta con 3 menus; (1) Panel de administracion, (2) Permite subir archivos en formatos PDF y Excel y (3) el cotizador de precios desde un Excel previamente llenado.

## Conocimiento 

    
    PHP 7.2.24
    Laravel Framework 7.3.0
    

Se requieren los siguientes paquetes dentro del proyecto:

- [A pure PHP library for reading and writing spreadsheet files](https://github.com/PHPOffice/PhpSpreadsheet)


## Install

- Copiar el repositorio y/o clonar con git:
    ~~~
    git clone https://github.com/manuelvidales/coti.git
    ~~~

- Correr el composer install:
    ~~~
    composer install --optimize-autoloader --no-dev
    ~~~

- Generar la clave de laravel:
    ~~~
    php artisan key:generate
    ~~~

- Almacenar archivos debe crear carpeta archivos en storage/app/ y despues ejecutar:
    ~~~
    php artisan storage:link
    ~~~

- Archivo Excel debe estar localizador en:
    ~~~
    storage/app/public/cotiza.xlsx
    ~~~

- Listo!


## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
