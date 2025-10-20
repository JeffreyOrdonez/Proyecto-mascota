# Comandos Esenciales para Iniciar un Proyecto Laravel

Esta es una guía de referencia rápida con los comandos más comunes que necesitarás al configurar un nuevo proyecto Laravel desde cero.

## 1. Crear el Proyecto (usando Composer)

Este comando descarga Laravel y crea un nuevo directorio para tu proyecto.

```bash
composer create-project laravel/laravel nombre-del-proyecto
```

## 2. Configurar el Entorno

Navega al directorio del proyecto y copia el archivo de configuración de ejemplo.

```bash
cd nombre-del-proyecto
cp .env.example .env
```

## 3. Generar la Clave de la Aplicación

Esta clave es fundamental para la seguridad y encriptación de tu aplicación.

```bash
php artisan key:generate
```

## 4. Configurar la Base de Datos

Abre el archivo `.env` y ajusta las variables de la base de datos (`DB_*`).

**Para SQLite (opción simple y rápida):**

1.  Crea el archivo de la base de datos:
    ```bash
    touch database/database.sqlite
    ```
2.  Actualiza tu archivo `.env`:
    ```
    DB_CONNECTION=sqlite
    DB_DATABASE=/database/database.sqlite
    ```
    *(Elimina las otras variables `DB_HOST`, `DB_PORT`, `DB_USERNAME`, `DB_PASSWORD` o déjalas vacías)*

**Para MySQL/MariaDB:**

1.  Asegúrate de que tu servidor de base de datos (ej. Laragon, XAMPP) esté corriendo.
2.  Crea una nueva base de datos (ej. `mi_proyecto_db`).
3.  Actualiza tu archivo `.env`:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mi_proyecto_db
    DB_USERNAME=root
    DB_PASSWORD=tu_contraseña_si_tienes
    ```

## 5. Ejecutar las Migraciones

Este comando crea las tablas básicas de Laravel en tu base de datos.

```bash
php artisan migrate
```

## 6. Instalar Dependencias de Frontend

Instala las dependencias de JavaScript y CSS definidas en `package.json`.

```bash
npm install
```

## 7. Ejecutar los Servidores de Desarrollo

Necesitas dos terminales para esto:

1.  **Terminal 1: Servidor de Laravel (backend)**
    ```bash
    php artisan serve
    ```
    *(Tu aplicación estará disponible en `http://127.0.0.1:8000`)*

2.  **Terminal 2: Servidor de Vite (frontend)**
    ```bash
    npm run dev
    ```
    *(Esto compila tus assets de JS/CSS y los actualiza automáticamente cuando haces cambios)*

---

### Comandos Adicionales Útiles

-   **Crear un controlador:**
    ```bash
    php artisan make:controller NombreController
    ```
-   **Crear un modelo (y su migración con `-m`):**
    ```bash
    php artisan make:model NombreModelo -m
    ```
-   **Limpiar la caché:**
    ```bash
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
    ```
-   **Ejecutar tests:**
    ```bash
    php artisan test
    ```
