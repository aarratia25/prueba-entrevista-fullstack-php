# Prueba Entrevista Alfredo Arratia FullStack PHP

Este repositorio contiene una solución para una prueba técnica de desarrollo FullStack con PHP utilizando el framework Laravel.

## Pre-requisitos

-   PHP >= 7.3
-   Composer
-   MySQL
-   Git

## Instalación

1. **Clonar el Repositorio**:

    ```bash
    git clone https://github.com/aarratia25/prueba-entrevista-fullstack-php.git
    cd prueba-entrevista-fullstack-php
    ```

2. **Instalar Dependencias**:

    ```bash
    composer install
    ```

3. **Configurar Entorno**:

    - Copia el archivo `.env.example` a `.env`:

        ```bash
        cp .env.example .env
        ```

    - Modifica el archivo `.env` para configurar la conexión a tu base de datos (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, y DB_PASSWORD).

4. **Generar Clave de la Aplicación**:

    ```bash
    php artisan key:generate
    ```

5. **Migraciones**:

    Realiza las migraciones para crear las tablas en la base de datos:

    ```bash
    php artisan migrate --seed
    ```

6. **Configurar JWT**:

    Si no has generado la clave secreta para JWT, hazlo con el siguiente comando:

    ```bash
    php artisan jwt:secret
    ```

7. **Iniciar el Servidor**:

    Puedes usar el servidor de desarrollo incluido con Laravel:

    ```bash
    php artisan serve
    ```

    Ahora, puedes visitar `http://127.0.0.1:8000` en tu navegador para acceder a la aplicación.

## Uso

### Autenticación:

1. **Registrar un usuario**:

    - Endpoint: `/register`
    - Método: `POST`
    - Parámetros: `name`, `email`, `password`

2. **Iniciar sesión**:
    - Endpoint: `/login`
    - Método: `POST`
    - Parámetros: `email`, `password`

### Gestión de clientes:

1. **Registrar un cliente**:

    - Endpoint: `/customers`
    - Método: `POST`
    - Parámetros: `dni`, `id_reg`, `id_com`, `email`, `name`, `last_name`, `address`, `date_reg`, `status`

2. **Consultar cliente por DNI o Email**:

    - Endpoint: `/customers/{dni}` o `/customers/{email}`
    - Método: `GET`

3. **Eliminar cliente**:
    - Endpoint: `/customers/{dni}`
    - Método: `DELETE`

## Postman Collection

Para facilitar las pruebas, hemos creado una colección de Postman. Puede descargarla y usarla desde el siguiente enlace:

[Postman Collection](https://www.postman.com/interstellar-comet-447452/workspace/prueba-entrevista-fullstack-php/collection/23678736-3f1b8a85-1ac4-4680-9c6c-406aca1166f3?action=share&creator=23678736&active-environment=23678736-75c9779a-cbf3-4f2f-ab7a-b58f2fb8bf6a)

## Registro de Actividad

El sistema registra automáticamente la entrada y salida de información. Estos registros incluyen la IP del cliente y se pueden configurar a través de las variables `LOG_INPUT` y `LOG_OUTPUT` en el archivo `.env`.

## Contribuciones y Soporte

Si tiene alguna pregunta, problema o sugerencia, no dude en abrir un Issue en el [repositorio de GitHub](https://github.com/aarratia25/prueba-entrevista-fullstack-php.git).