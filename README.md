# Despensa La Bendición

Proyecto Laravel para la gestión de una despensa.

---

## Requisitos

- **PHP** >= 8.1
- **Composer**
- **MySQL** o **MariaDB**
- **Git**

---

## Instalación

1. **Clona el repositorio**
    ```bash
    git clone https://github.com/JFranVT/proyecto-final.git
    cd proyecto-final
    ```

2. **Instala dependencias de Composer**
    ```bash
    composer install
    ```

3. **Copia el archivo de entorno**
    - En Linux/Mac:
        ```bash
        cp .env.example .env
        ```
    - En Windows:
        ```bash
        copy .env.example .env
        ```

4. **Configura el archivo `.env`**
    - Edita `.env` y coloca los datos de tu base de datos y otros parámetros necesarios.

5. **Genera la clave de la aplicación**
    ```bash
    php artisan key:generate
    ```

6. **Importa la base de datos**
    - Crea una base de datos vacía en tu gestor (MySQL/MariaDB).
    - Importa el archivo `.sql` proporcionado (si existe) usando tu gestor de base de datos favorito (phpMyAdmin, MySQL Workbench, consola, etc.).

7. **Inicia el servidor**
    ```bash
    php artisan serve
    ```

8. **Accede a la aplicación**
    - Abre tu navegador en [http://localhost:8000](http://localhost:8000)

---

## Estructura principal del proyecto

- **Modelos:**  
  Ubicados en `app/Models`, representan entidades como Almacen, Cliente, Producto, Proveedor, Usuario, Venta, etc.

- **Controladores:**  
  Ubicados en `app/Http/Controllers`, gestionan la lógica de negocio y las rutas.

- **Vistas Blade:**  
  Ubicadas en `resources/views`, incluyen carpetas para almacenes, clientes, productos, proveedores, usuarios, ventas, además de vistas principales como `home.blade.php`, `panel.blade.php` y `welcome.blade.php`.

- **Rutas:**  
  Ubicadas en `routes/web.php` para rutas web y `routes/console.php` para comandos de consola.

---

## Notas

- Si tienes problemas con permisos en `storage` o `bootstrap/cache`, asegúrate de darles permisos de escritura.
- Este proyecto **no incluye módulo de imágenes ni migraciones automáticas**. Debes importar la base de datos manualmente.
- Si necesitas personalizar las vistas, revisa la carpeta `resources/views`.

---

## Créditos

Desarrollado por JFranVT

---

¿Tienes dudas o sugerencias?  
Abre un issue en este repositorio.
