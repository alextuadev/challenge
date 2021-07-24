<p>Indica paso a paso los comandos para una instalación básica de Laravel que me permita ver la página principal
    (recuerda describir qué hace cada comando).</p>


<p>Prerequisito: Tener instalado composer</p>
<ol>
    <li>
        <strong>Crear el proyecto:</strong> <code>composer create-project --prefer-dist laravel/laravel
            nombreproyecto</code>
        <p>Con este comando descargamos el framework completo usando la última versión disponible y le damos por nombre
            "nombreproyecto"</p>
    </li>

    <li>
        <strong>Key App:</strong>
        <p>Verificamos que en nuestro .env tengamos APP_KEY= con nuestra clave, en caso de no tenerlo corremos el
            comando:
            <code>php artisan key:generate </code>
        </p>
    </li>

    <li>
        <strong>Conexion a base de datos:</strong>
        <p>Si vamos a tener conexión a la base de datos, configuramos en el archivo .env las respectivas credenciales
        </p>
        <p>
            <code>
                DB_CONNECTION=mysql</br>
                DB_HOST=127.0.0.1</br>
                DB_PORT=3306</br>
                DB_DATABASE=challenge</br>
                DB_USERNAME=root</br>
                DB_PASSWORD=</br>
            </code>
        </p>
    </li>

    <li>
        <strong>Migraciones:</strong>
        <p>Si tenemos migraciones en nuestra base de datos procedemos a correrlas usando:
            <code>php artisan migrate </code>
            Podemos pasar <code>--seed</code> si quedemos que se llenen con valores de nuestros seeds
        </p>
    </li>

    <li>
        <strong>Levantar servido de desarrollo:</strong>
        <p><code>php artisan serve </code>
            Con este comando levantamos un servidor de desarrollo y podemos acceder a la ruta incial que viene por default llamada
             <code>welcome.blade.php</code>
        </p>
    </li>

</ol>
