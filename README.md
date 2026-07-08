# Sistema de Gestión de Taller Mecánico

## Descripción

Sistema web desarrollado en PHP bajo el patrón MVC para la administración de un taller mecánico.

El sistema permite gestionar:

- Clientes
- Vehículos
- Mecánicos
- Servicios
- Órdenes de trabajo

Además, cuenta con una interfaz desarrollada con HTML, CSS, JavaScript y Bootstrap 5.

---

## Tecnologías utilizadas

- PHP 8
- MySQL
- HTML5
- CSS3
- JavaScript
- Bootstrap 5
- XAMPP

---

## Requisitos

- PHP 8 o superior
- MySQL
- Apache
- XAMPP

---

## Instalación

### 1. Clonar o copiar el proyecto

Copiar la carpeta del proyecto dentro de:

```
xampp/htdocs/
```

Ejemplo:

```
xampp/htdocs/TallerMecanico/
```

---

### 2. Iniciar XAMPP

Activar:

- Apache
- MySQL

---

### 3. Crear la Base de Datos

Abrir phpMyAdmin.

Crear una base de datos llamada:

```
taller_mecanico
```

Importar el archivo:

```
taller_mecanico.sql
```

---

### 4. Configurar la conexión

Editar el archivo:

```
config/conexion.php
```

Ejemplo:

```php
private static $host="localhost";
private static $usuario="root";
private static $password="";
private static $bd="taller_mecanico";
```

---

### 5. Ejecutar

Abrir el navegador.

```
http://localhost/TallerMecanico/
```

Se mostrará la página principal del sistema.

---

## Funcionalidades

- Gestión de Clientes
- Gestión de Vehículos
- Gestión de Mecánicos
- Gestión de Servicios
- Gestión de Órdenes de Trabajo
- Registro
- Edición
- Eliminación
- Visualización de información

---

## Frontend

El sistema utiliza:

- HTML5
- CSS3
- Bootstrap 5
- JavaScript

Se incluyen validaciones del lado del cliente mediante JavaScript.

---

## Arquitectura

Se implementó el patrón MVC.

```
controllers/
models/
views/
config/
public/
index.php
```

---

## Autores

Proyecto académico desarrollado para la materia de Desarrollo de Aplicaciones Web 6-7 Ciclo 1 2026-2027, por Luis Naranjo, Katherine Maldonado, Joseph Calderon, Misael Junto y Andy Miranda.