# Laravel 10 Starter
Admin Panel basado en laravel 10, bootstrap 5, adminLTE 3 con roles y permisos integrado

## Características

* jeroennoten/Laravel-AdminLTE
* Roles y permisos basado en Laravel Permissions
* Datatables integrada
* SweetAlert2 integrado

## Comenzando 🚀

_Sigue las siguientes instruscciones para clonar este repositorio en tu máquina local y poder trabajar desde el principio con la plantilla Laravel10-starter._

### Pre-requisitos 📋

Para clonar este repositorio, debes tener instalado un servidor Apache, PHP y MSQL (Laragon, Xampp, Mamp o Lamp), Composer y NodeJs, GIT (preferiblemente).

Antes de comenzar verifica si tienes composer con cualquiera de los siguientes comandos en tu terminal.
```
composer --version
composer -V
```
Si no lo tienes instalado lo pueden instalar siguiendo la documentación oficial en:
https://getcomposer.org/doc/00-intro.md

Verifica tambien la version de NPM en la terminal con
```
npm -v
```
Si no lo tienes instalado lo pueden instalar siguiendo la documentación oficial en:
https://www.npmjs.com/get-npm

Verifica las versiones de cada uno de ellos

Versión PHP - 8.1
Versión Mysql - 8.0
Versión Composer - 2.5.8
Versión NPM - 9.5.1

### Instalación 🔧

_Sigue las siguientes instrucciones para clonar el repositorio_

_Clone el repositorio_

```
git clone https://github.com/robertjota/laravel10-starter.git
```

_Instale todas las dependencias del Proyecto con_

```
composer install
```

_Actualize las dependencias de Composer con_

```
composer update
```

_Como el proyecto tiene dependencias en JS instalelas con_

```
npm install
```

_Actualize las dependencias de NPM con_

```
npm update
```

_compile css y js_

```
npm run dev
o
npm run build
```

_Copie el Archivo .env.example en un archivo nuevo .env con_

```
cp .env.example .env
```
_Configure la base de datos y las demas variables de entorno en el archivo .env_

_Genere una nueva Key para el protecto con_

```
php artisan key:generate
```

_Corra las migraciones del proyecto con_

```
php artisan migrate
```

_Corra los seeder del proyecto con_

```
php artisan db:seed
```
_Corra el proyecto con_

```
php artisan serve
```

_Si todo está correcto puede acceder al proyecto en la dirección http://localhost:8000_

Super Admin: superadmin@gmail.com
Admin: admin@gmail.com
Usuario: usuario@gmail.com

Contraseña: password

### Personalización

El sistema base está diseñado para ser personalizado. Puedes modificar lo que requieras para adaptar el sistema a tus necesidades.

Desarrolle esta base porque no encontre una que se adaptara a lo que yo necesitaba y que realmente ahorrara tiempo para nuevos desarrollos, espero les sea util sobretodo a los que se inician con laravel.

### Contribuir

Las contribuciones son bienvenidas. Puedes reportar problemas o enviar pull requests en el repositorio de GitHub.

### Licencia
Este proyecto está bajo la licencia MIT.

---
[Robert Arias](https://github.com/robertjota)
_Desarrollador de Sistemas_
