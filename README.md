# Despensa La Bendición

Proyecto Laravel para gestión de despensa.

## Requisitos

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Git

## Instalación

1. **Clona el repositorio**
    ```sh
    git clone https://github.com/usuario/tu-repo.git
    cd tu-repo
    ```

2. **Instala dependencias de Composer**
    ```sh
    composer install
    ```

3. **Copia el archivo de entorno**
    - En Linux/Mac:
      ```sh
      cp .env.example .env
      ```
    - En Windows:
      ```sh
      copy .env.example .env
      ```

4. **Configura el archivo `.env`**
    - Edita `.env` y coloca los datos de tu base de datos y otros parámetros necesarios.

5. **Genera la clave de la aplicación**
    ```sh
    php artisan key:generate
    ```

6. **Importa la base de datos**
    - Crea una base de datos vacía en tu gestor (MySQL/MariaDB).
    - Importa el archivo `.sql` proporcionado (si existe) usando tu gestor de base de datos favorito (phpMyAdmin, MySQL Workbench, consola, etc.).

7. **Inicia el servidor**
    ```sh
    php artisan serve
    ```

8. **Accede a la aplicación**
    - Abre tu navegador en [http://localhost:8000](http://localhost:8000)

---

## Notas

- Si tienes problemas con permisos en `storage` o `bootstrap/cache`, asegúrate de darles permisos de escritura.
- Este proyecto **no incluye módulo de imágenes** ni migraciones automáticas. Debes importar la base de datos manualmente.

---

**¡Listo! Tu proyecto estará funcionando en la nueva PC.**
