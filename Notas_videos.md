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

***### > Video4: Vistas***
---
### ***Vistas***
Las vistas son contenido html que van a mostrar los datos que son enviados por el controlador.
Cada metodo de controlador va a tener una vista asociada.
#### Alojamiento de vistas
Los archivos de vistas se guardan en el directorio *app/resourses/*__views__.
Para mejor organizacion, por cada controlador que meneje mas de un metodo, se podra crear un directorio dentro de **views** que agrupe todas sus vistas.
    <pre>
        resources/views/
        ????????? cursos
        ???   ????????? create.blade.php
        ???   ????????? index.blade.php
        ???   ????????? show.blade.php
        ????????? home.blade.php
    </pre>
#### Llamar una vista
Para acceder a una vista desde un controlador debemos llamarlo con ***view('nombre_vista')**
##### Metodo view('')
Este metodo nos ubica en el directorio **views**, donde se alojan las vistas, luego debemos indicarle el path de la plantilla que necesitamos acceder.
    <pre>
        <?php
            namespace App\Http\Controllers;
            use Illuminate\Http\Request;
            class HomeController extends Controller
            {
                public function __invoke()
                {
                    return view('home');
                }
            }
    </pre>
##### Pasando Variables a la vista
Para pasar variables desde el controlador a la vista lo hacemos desde la invocacion de **view** en forma de _array_
    <pre>
        public function show(_$lenguaje_){
            return view('cursos.show', **['lenguaje'=>$lenguaje]**);
        }
    </pre>
###### Pasando Variables con compact('')
Para generar un array con el mismo nombre de la variable podemos usar ***compact('nombre')***. Este devuelve un _array_ de tipo **['nombre'=>'$nombre']**
    <pre>
        public function show(_$lenguaje_){
            return view('cursos.show', **compact**('lenguaje');
        }
    </pre>

### ***Blade***
Es un motor de plantillas, que nos permite reutilizar codigo html.
#### Creando Plantillas
Las plantillas de _blade_ se alojan dentro del directorio _app/resourses/views/_***layouts***
Todas las plantillas y formularios de vistas deben llevar la extension **blade** para que este motor lo reconozca. 
Para eso agregamos al nombre del archivos la extension **.blade**.
> nombre.blade.php
    <pre>
       resources/views/
        ????????? cursos
        ???   ????????? create.blade.php
        ???   ????????? index.blade.php
        ???   ????????? show.blade.php
        ????????? home.blade.php    
    </pre>

#### Definiendo contenido dinamico
Para crear una plantilla debemos crear el arhivo que contendra el codigo a reutilizar.
En los campos dinamicos los definiremos con una etiqueda **@yield('nombre')**
    <pre>
        app/resourses/views/layouts/plantilla.blade.php
        <br>
        \<!DOCTYPE html>
            \<html lang="en">
            \<head>
                \<meta charset="UTF-8">
                \<meta http-equiv="X-UA-Compatible" content="IE=edge">
                \<meta name="viewport" content="width=device-width, initial-scale=1.0">
                \<title>@yield('title')\</title>
            \</head>
            \<body>
                    @yield('contenido')
            \</body>
            \</html>
    </pre>

#### Heredando contenido
Para extender una plantilla, usaremos la notacion blade **@extends('directorio.nombreplantilla')**
    <pre>
        app/resourses/views/home.blade.php
        <h5>
        @extends('layouts.plantillas')
        ... # ...
    </pre>
#### Agregando contenido dinamico
Luego de Heredar el contenido de la plantilla, para agregar el contenido con la notacon **@section('nombre', 'contenidoDinamico')** 
    <pre>
        app/resourses/views/home.blade.php
        <h5>
        ... # ...
        @section('title', 'Cursos - Index')
        @section('contenido')
            \<h1>Bienvenido a cursos index\</h1>
        @endsection</h5>
    </pre>

***### < Video4: Vistas***
---
***### < Video5: DB conexion***
---
### ***Creando conexion***
Laravel soporta conexiones con 4 BD (ver documentacion).
Para crear una conexion, previamente debemos tener la BD creada.
Luego de esto, pasamos a configurar la conexion, y esto lo hacemos en el archivo ***database.php***, que se encuentra en _app/config/database.php_.
#### Variables de Entorno .env
Los datos necesarios para la conexion los debedos setear en el archivo ***.env**
***### < Video5: DB conexion***

***### > Video6: Migraciones***
---
### ***Que son las Migraciones***
Son un control de versiones de los cambios realizados sobre la BD. 
Permite volver a un estado anterior de la BD.
#### Directorio de Migraciones
Cada migracion genera un archivo php, _migracion.php_, los que se guardan en el directorio _app/database/_***migrations***.
#### Metodos de una Migracion
Las migraciones son clases que extienden a _Migration_, _class NewMigration extends **Migration**_.
Cada clase migracion se compone de dos metodos: ***up()*** y ***down()***, tal como indica su nombre crean y borran los cambios que generan.
#### Realizando una Migracion
Para ejecutar las migraciones, dentro de la consola, ejecutamos el siguiente comando:
    <pre>
        php artisan migrate
    </pre>
Este proceso recorre todos los archivos de migraciones ejecutando los metodos **up()**.
#### Tabla Migraciones
Con la primera migracion ejecutada, ademas de los cambios que realizan los metodos _up()_ sobre la BD, tambien _se crea la tabla_ ***migraciones*** donde se guarda el registro de las migraciones ejecutadas.
Las migraciones ejecutadas se agrupan por _lotes_.
#### Lotes
Los lotes son grupos de migraciones que se realizaron en una misma ejecucion.
Estos lotes se diferencian en la columna ***batch*** de la tabla _migraciones_.

***### < Video6: Migraciones***

***### > Video7: Migraciones - RollBack***
---
### ***Creando Migraciones***
Puedo crear una migracion con el siguente comando:
    <pre>
        php artisan make:migration miMigracion
    </pre>
Esto me genera un archivo de en el directorio de migraciones con nombre _miMigracion.php_.
Esta clase tendra los metodos _up()_ y _down()_ vacios.
#### Editando Mi Migracion
##### Creando Tabla - up()
Para crear debo editar el metodo _up()_
Para crear tabla, hago uso de la clase ***Schema*** y su metodo ***create('nombreTabla', /* */)***
    <pre>
        function up(){
            **Schema::create('nombreTabla'**, //Columnas){
                //
            }
        }
    </pre>
##### Creando Columna - up()
Al igual que lo anterior, y continuando en la funcion _create()_.
Hago uso de una funcion a la que le paso el parametro una instancia ***Blueprint***_$variable_.
    <pre>
        function up(){
            Schema::create('nombreTabla', function(**Blueprint $variable**){
                $variable->id();
                $variable->string('name')
                $variable->text('direccion')
            })
        }
    </pre>
##### Borrando tabla - down()
El borrado de tabla, corresponde a la funcion _down()_
    <pre>
        public function down(){
            Schema::dropIfExists('nombreTabla')
        }
    </pre>
### Revertir cambios - rollback
Los cambios se revierten por _lotes_, del mas reciente al mas antiguo.
    <pre>
        php artisan migrate:rollback
    </pre>
#### Eliminando archivos de migracion
Para poder eliminar archivos de migracion en el proyecto, debo asegurarme que no haya registro en la tabla **migrations** de la DB de la migracion a eliminar.
En el caso de haber registro, se ejecuto esa migracion, debo _realizar un rollback_ hasta eliminarlo de la DB, luego de eso elimino el archivo.
### Creando Migraciones segun convecion
Laravel nos sugiere crear migraciones con la siguiente convencion **create** ***\_nombre\_*** **tabla**.
    <pre>
        php artisan make:migration **create** ***\_nombre\_*** **tabla**
    </pre>
Esto nos crea una migracion con los metodos _up()_ y _down()_ pre editados.
### Agegando nuevas columnas
Se pueden agregar nuevas columnas a una tabla creada por migraciones.
Para eso se edita el metodo _up()_ de la migracion deseada y luego se ejcuta el comando **migrate:fresh**
    <pre>
        php artisan ***migrate:fresh***
    </pre>
Lo que hace este proceso, es recorrer todos los archivos de migraciones ejecutando los metodos **down()** y luego **up()**.
En esa destruccion y recontruccion de las tablas ***se pierden los datos existentes***.

***### < Video7: Migraciones - RollBack***

---
***### > Video8: Migraciones - Update sin perder datos***
---
### ***Realizar Actualizaciones sin perder datos***
Modifcar la tabla, columnas y propiedades sin perder datos.
#### Diferencia ente Fresh y REfresh
**fresh**: elimina todas las tablas, luego ejecuta todos los metodos _up()_ de cada migracion.
**refresh**: recorre uno a uno las migraciones ejecutando _down()_ luego el _up()_.
#### Update de Tablas
Para la modificacion de tablas usaremos el metodo **table** de la clase _Schema_.
    <pre>
        Schema::**table**('nombretable', function(Blueprint){
            //
        })
    </pre>
##### Tablas
Podemos hacer varios cambios, seguir en documentacion. [link](https://laravel-com.translate.goog/docs/8.x/migrations?_x_tr_sl=auto&_x_tr_tl=es&_x_tr_hl=en&_x_tr_pto=ajax#tables)
##### Columnas
Podemos hacer varios cambios, seguir en documentacion. [link](https://laravel-com.translate.goog/docs/8.x/migrations?_x_tr_sl=auto&_x_tr_tl=es&_x_tr_hl=en&_x_tr_pto=ajax#columns)
##### Propiedades
[link](https://laravel-com.translate.goog/docs/8.x/migrations?_x_tr_sl=auto&_x_tr_tl=es&_x_tr_hl=en&_x_tr_pto=ajax#columns)

***### < Video8: Migraciones - Update sin perder datos***
---
***### > Video9: ORM***
---
Laravel8 usa como _orm_ a **eloquent**.
El _orm_ permite tratar cada tabla como una clase, y cada registro como un objeto.
### ***Modelo***
El **Modelo** nos permite definir una _Clase_ para administrirar una _Tabla_ en la BD.
El mapeo entre _Clase_ --> _Tabla_ se puede hacer con el uso de _convension_ o a mano.
#### Creando Modelo
    <pre>
        php artisan _make_:**model Nombre**
    </pre>
##### Convencion
El uso de la _convesion_ para crear un modelo nos facilita el reconocimiento para asociar un _modelo_ con su _tabla_.
La _convesion_ trata en escribir el nombre del Modelo y luego Eloquent lo asocia con una tabla con el mismo nombre en plural:
    <table>
        <tr>
            <td><h4>Modelo</h4></td>
            <td><h4>Tabla</h4></td>
        </tr>
        <tr>
            <td>User</td>
            <td>users</td>
        </tr>
        <tr>
            <td>Person</td>
            <td>persons</td>
        </tr>
        <tr>
            <td>Car</td>
            <td>cars</td>
        </tr>
        <tr>
            <td>Cuenta</td>
            <td>cuentas</td>
        </tr>
    </table>
##### Directorio de los Modelos
Los modelos se guardan en app/app/**Models**
##### Probando los Modelos - Tinker
Para probar los modelos, usamos a [**tinker**](http://translate.google.com/translate?hl=en&sl=auto&tl=es&u=https%3A%2F%2Flaravel.com%2Fdocs%2F8.x%2Fmigrations&sandbox=1), nos permite interactuar con la app laravel desde la _cli_
<pre>
    php artisan trinker

    // use Name\Space\Modelo;
    use App\Models\Curso;

    // creo una instancia del Modelo
    $curso = new Curso();

    // seteo valores
    $curso->name='nombrecurso';

    $curso->descripcion='curso de prueba';

    // guardo en la BD
    $curso->save();
    
    //salgo de trinker
    exit
</pre>
##### Asignar un Modelo a Una tabla
Si es mi eleccion puedo asingar un modelo a una tabla manualmente.
En el modelo seleccionado debo definir la variable _$table_ y asinarle el valor _nombre de la tabla_ que quiero administrar.
    <pre>
        ... # ...
        class Curso extends Model{
            ... # ... 
            protected **$table** = **'usuario'**
            ... # ...
        }
    </pre>

***### < Video9: ORM***
---
***### > Video10: Seeders***
---
### ***Seeders***
Los seeders nos permiten cargar datos de forma masiva.
#### DB Seeders
El archivo **DatabaseSeeder.php** se encuentra en el directorio _app/database/seeders_.
Podemos cargar datos desde este archivo. Pero en grandes cantidades no es recomendable.
Para cargar datos, dentro del archivo uso la misma sintaxis usada en tinker.
    <pre>
        php artisan migrate:**fresh**
        //
        php artisan **db:seed**
    </pre>
#### Clases Seeders
Para cargar datos de grupos distintos, entidades distintas, se sugiere agruparlos en archivos separados.
Para eso podemos crear nuestro seeders.
#### Usando Seeders
##### Creando Seeders Clase
    <pre>
        php artisan make:seeder NombreSeeder
    </pre>
##### Vinculando DBseeder --> ClassSeeder
Edito DBseeder
    <pre>
        $this->call('ClassSeeder::Class')
    </pre>
En la consola ejecuto
    <pre>
        php artisan migrate:fresh --seed
    </pre>

***### < Video10: Seeders***
---
***### > Video11: Factory***
---
### ***Factory, Que son?***
Son fabricas, que nos perminten automatizar la carga de datos de prueba en la BD.
Esto facilita la carga de registro en la cantidad que deseemos.
#### Creando Factory
Para la cracion de Factory usaremos el comando _php artisan_ **make:factory** NombreFactory
1. ##### Factory Generico
Podemos crear un Factory generico con el comando:
    <pre>
        _php artisan_ **make:factory** NombreFactory
    </pre>
Este archivo lo tenemos que editar, ajustandolo a la tabla que queremos cargar.
2. ##### Factory para un modelo determinado
Creamos un factory asociado al modelo que queremos administrar.
    <pre>
        _php artisan_ **make:factory** NombreFactory **--model=** nombreModelo
    </pre>
#### Creando Datos
1. ##### Editando Factory
    <pre>
        return [
            'name'=>$this->faker-> // 
        ]
    </pre>
    Dentro del Modelofactory puedo instanciar los metodos de la calse Factory como son _fake_ y sus metodos. 
2. ##### Editando CursoSeeder
    <pre>
        Modelo::factory(50)->crate();
    </pre>
    Desde el seeder, llamo a la fabrica del modelo.
3. ##### Ejecutando la carga de datos
    <pre>
        php artisan _make:fresh --seed_
    </pre>
4. ##### Refactorizando
Se puede llamar a la fabrica desde _databaseseeder.php_.
Para eso editamos el ese archivo llamando a la fabrica que queremos cargar.
    <pre>
        Modelo1::factory(50)->crate();
        Modelo2::factory(30)->crate();
    </pre>

***### < Video11: Factory***
---

***### > Video12: Consultas Eloquent***
---
Las consultas se pueden seguir de la documentacion de laravel:
1. [construyendo consultas](https://laravel.com/docs/8.x/queries#ordering-grouping-limit-and-offset)
2. [colecciones eloquent](https://laravel.com/docs/8.x/eloquent-collections)
3. [colecciones](https://laravel.com/docs/8.x/collections)
Como se ve, se trata de manejo de colecciones.
Es un **tema importante** ya que tiene grandes apartados en temas distintos.
#### Ejemplos del video.
    <pre>
        use App\Models\Curso
//
        $cursos = Curso::**all()**
//
        where, orderBy, first, select, alias, take, find, consultas complejas (where)
    </pre>

***### < Video12: Consultas Eloquent***
---
***### > Video14: Validaciones***
---
### ***Validacion de Campos***
Las validaciones se pueden realizar con el metodo **validate()**.
[Validaciones](https://laravel.com/docs/8.x/validation)
#### Metodo Validate()
Para hacer validaciones de datos antes mandarlos a la BD podemos usar el metodo **validate()**.
> Dentro del controlador
    <pre>
        $objeto->validate([
            'nombre_atributo' => 'tipo_validacion'
        ]);
    </pre>
    <pre>
        $objeto->validate([
            'atributo_1' => 'required',
            'atributo_2' => 'required',
            'atributo_3' => 'required'
        ]);
    </pre>
#### Validando sin perder datos.
Esto se refiere al momento de editar un registro y al detectar un error la pagina se recarga eliminando los datos que se muestran.
#### Metodo old()
Para evitar los anterior podemos hacer uso del metodo **old()**.
> Dentro de la vista html
    <pre>
        //
        \<input name='nombreimput' _value={{ old('nombreimput')_ }}> \</input>
    <pre>
#### Metodo old() en formularios de edicion
Para estos casos donde queremos que nos muestre los valores existentes en un campo y a su vez, si los modificamos no queremos que se pierdan al recargar; lo solucionamos pasando un parametro al metodo **old('nombrecampo', 'valorDefault')**.
> Dentro de la vista html - ANTES -
    <pre>
            //
        \<imput name='nombreimput' value={{ $objeto->atributo }}>\</imput>
            //
    </pre>
> Dentro e la vista html - DESPUES -
    <pre>
            //
        \<imput name='nombreimput' _value={{ old('nombreimput'**, $objeto->atributo**) }}_ >\</imput>
            //
    </pre>
#### Agregando mas reglas de validacion.
Es posible agregar mas reglas de validacion a un mismo campo.
> Dentro del controlador
    <pre>
        $objeto->validate([
            'atributo' => 'required | max:10 | unique'
        ]);
    </pre>
Se recomienda, si las validaciones son muy grandes colocarlas en un archivo separado del controlador.
### ***Mensajes de Error***
Los msj de Error son lanzados al momento que se detecta un error en la validacion. 
Para ello, la validacion y el msj error deben estar vinculados.
Esta vinculacion se hace atraves del atributo del registro.
#### Imprimiendo Mensaje de error
Para la impresion de msj de error hacemos usos de la directiva _blade_ **@error('nombretaghtml')**
> Dentro de la vista html
    <pre>
            //
        \<imput name='**nombretaghtm**' value={{ old('**nombretaghtm**', $objeto->atributo) }} >\</imput>
            //
        **@error('_nombretaghtm_')**
            {{ message }}
        **@enderror**
    </pre>
#### Traduccion de Mensajes
Por defecto los msj que se imprimen estan en ingles.
Los archivos que contienen los mensajes se guardan en el directorio _MyProyect/resources/_**lang/**. Dentro de _lang_ estan los directorios con los idiomas:
> Dentro de lang
    <pre>
        lang/
        ????????? en
        ???   ????????? auth.php
        ???   ????????? pagination.php
        ???   ????????? passwords.php
        ???   ????????? validation.php
        ????????? es
            ????????? auth.php
            ????????? pagination.php
            ????????? passwords.php
            ????????? validation.php
    </pre>
##### Traduciendo Mensajes de error
Para traducir los msj debemos traducir el contenido los archivos que contiene los directorio de idiomas.
> En lang abro una terminal 
    <pre>
        $ pwd
        MyProject/resources/lang
    </pre>
    <pre>
        $ cp en/ ./es
    </pre>
    <pre>
        $ ls 
        en es
    </pre>
[Traducir](https://github.com/MarcoGomesr/laravel-validation-en-espanol) el contenido de estos archivos
    <pre>
        es/
        ????????? auth.php
        ????????? pagination.php
        ????????? passwords.php
        ????????? validation.php
    </pre>
Luego de esto debemos indicarle a Laravel que tome los mensajes del idioma que queremos. 
Para eso editamos la variable **'locale'** que se encuentra en el archivo _MyProject/config/_**app.php**
    <pre>
        'locale' => 'es'
    </pre>

***### < Video14: Validaciones***