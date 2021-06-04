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
