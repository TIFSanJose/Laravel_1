***### > Video<numero>: guia***
---
### ***Titulo2***
#### Subtitulo1
##### Subtitulo2
###### Subtitulo3
***### < Video<numero>: guia***
---

***### > Video1: presentacion***
---
***### < Video1: presentacion***
---
***### > Video2: Rutas***
---
### ***From Controller***
Hay solo un punto de entrada a la app, esto es lo que se llama FromController. 
El unico punto de entrada es por el archivo _index.php_ que esta dentro de la carpeta _/public_.
_/public_ es el unico directorio accesible al usuario, asi que, todo lo que contega lo puede ver el usuario de la app.

### ***Rutas***
Laravel para poder saber que pagina tiene que mostrar utiliza __rutas__
Las rutas estan definidas en el archivo _web.php_ que esta dentro del directorio _/routes_.
#### Creando Rutas
Para crear es sencillo: 
    <pre>
        Route::get('nombredelaruta', function(){
            return "cadena a devolver"
        }):
    </pre>
#### Pasando valor por la url
Al finalizar el nombre ruta se agrega el nombre variable
entre {}, eje.: '_nombreruta_/**{nombrevariable}**'
    <pre>
        Route::get('_nombreruta_/**{nombrevariable}**', function(**$nombrevariable**){
            return "valor de variable1: $variable1"
        }):
    </pre>
#### Pasando valores por la url
Podemos pasar mas de un valor por la url, solo debemos repetir lo anterior.
entre {}, eje.: '_nombreruta_/**{variable1}**/**{variable2}**'
    <pre>
        Route::get('_nombreruta_/**{variable1}**/**{variable2}**', function(**$variable1**, **$variable2**){
            return "valor de variable1: $variable1, valor de variable2: $variable2"
        }):
    </pre>
##### Inclusion de rutas
En los ejemplos anteriores vemos que parte de la ruta, _nombreruta_, se repite, para los dos ejemplos. 
Lo que podemos hacer es incluir las rutas dejando una como opcional, ver ejemplo.
Para indicar que variable es _opcional_ al declararla en la ruta, le agragamos un **signo de interrogacion al final** 
    <pre>
        Route::get('_nombreruta_/**{variable1}**', function(**$variable1**){
            return "valor de variable1: $variable1"
        }):
        Route::get('_nombreruta_/**{variable1}**/**{variable2}**', function(**$variable1**, **$variable2**){
            return "valor de variable1: $variable1, valor de variable2: $variable2"
        }):
    </pre>

Podemos mejorar quitando lineas inecesarias. 
Tener en cuenta *inicializar* la una de las variables en *null* **(function(*$variable1*, *$variable2*__=null__))**
    <pre>
        Route::get('_nombreruta_/**{variable1}**/**{variable2?}**', function(*$variable1*, *$variable2*__=null__){
                if (**$variable2**){
                    return "valor variable1: *$variable1*, valor variable2: *$variable2*"
                }else{
                    return "valor variable1: *$variable1*"
                }
        }):
    </pre>

***### < Video2: Rutas***
---
***### > Video3: Controladores***
---
### ***Como Crear un Controlador***
#### Donde creo mis controladores
Los controladores se crean dentro del directorio _/app/Http/_***Controllers***
#### Como Creo los controladores
Debo estar dentro del directorio de mi proyecto.
Luego utilizo el asistente de consola, y ejecuto el siguiente comando:
    <pre>
        php artisan make:controller NombreController
    </pre>
**Nota:** Por convesion todos los controladores al final de su nombre llevan la palabra ***Controller***.

### ***Como asignar una ruta a un Controlador***
Esto varia para ***laravel 8*** con respecto a sus versiones anteriores..  
#### Asignacion de rutas en Laravel 8
##### Controlador para Una ruta

1. **Antes**

    En el Controlador HomeController:
        <pre>
            <?php
                namespace App\Http\Controllers;
                use Illuminate\Http\Request;
                class HomeController extends Controller
                {
                    //
                }
        </pre>

    Archivo de rutas web.php
        <pre>
            <?php
                use Illuminate\Support\Facades\Route;
                Route::get('/', function () {
                    return "video 2 del curso laravel";
                });
        </pre>
2. **Despues**

    En el Controlador:
    > Debemos implementar la funcion que va a devolver los datos a la vista
        <pre>
            <?php
                namespace App\Http\Controllers;
                use Illuminate\Http\Request;
                class HomeController extends Controller
                {
                    public function __invoke(){
                        return "video 2 del curso laravel";
                    }
                }
        </pre>

    Archivo de rutas web.php
    > Para poder usar nuestro controlador Home, debemos declararlo usan *use* y su namespace
    
    > Luego Instanciarlo en la ruta *HomeController::class*
        <pre>
            <?php
                use Illuminate\Support\Facades\Route;
                use App\Http\Controllers\HomeController;
                Route::get('/',  HomeController::class);
        </pre>
##### Controlador para una msima ruta y distintas vistas
Controlador para manejar las distintas vistas de una misma ruta:

1.**Antes**
    Rutas web.php
        <pre>
        <?php
            use App\Http\Controllers\HomeController;
            use Illuminate\Support\Facades\Route;
            Route::get('curso', function() {
                return "video 2 del curso laravel";
            });
            Route::get('curso/crear', function() {
                 return "Aqui vamos a crear un curso";
            });
            Route::get('curso/{lenguaje}/{so?}', function($lenguaje, $so = null) {
                if($so){
                    return "bienvenido al curso de $lenguaje en so $so";
                }else{
                    return "bienvenido al curso de $lenguaje";
                }
            });
        </pre>
    Controlador CursoController.php
        <pre>
        <?php
            namespace App\Http\Controllers;
            use Illuminate\Http\Request;
            class CursoController extends Controller
            {
                //
            }
        </pre>
2.**Despues**
    Rutas web.php
        <pre>
        <?php
                ... # ...
            Route::get('curso', [CursoController::class, 'index']);
            Route::get('curso/crear', [CursoController::class, 'createCurso']);
            Route::get('curso/{lengauaje}', [CursoController::class, 'show']);
        </pre>
    Controlador HomeController.php
        <pre>
        <?php
            namespace App\Http\Controllers;
            use Illuminate\Http\Request;
            class CursoController extends Controller
            {
                public function index(){
                    return "index";
                }
                public function createCurso(){
                    return "aqui puedes crear un curso";
                }
                public function show($lenguaje){
                    return "bienvenido al curso de $lenguaje";
                }
        </pre>
#### Controladores en versiones anteriores a laravel 8
Debemos hacer una configuraciones los siguientes archivos:
    <pre>
        web.php
            <?php
                    ... # ...
                Route::get('curso', 'CursoController@index');
                    ... # ...
        CursoController.php
            <?php
                    ... # ...
                public function index(){
                    return "index";
                }
                    ... # ...
        app/Http/Providers/RouteServiceProviders.php
        /**
         * Descomentar esta variable
        **/
        protected $namespace = 'App\\Http\\Controllers';
    </pre>


### ***Algunos conceptos***
1. #### NameSpace
    Espacio de nombres, en realidad es el path donde esta ubicado mi archivo controlador.
2. #### __invoke()
    Esta funcion es declarada en los controlladores que manejan una unica vista, como ser _HomeController_.



***### < Video3: Controladores***
---