# Instalación

## Docker

Para instalar el proyecto es necesario tener instalado docker

```
https://www.digitalocean.com/community/tutorials/como-instalar-y-usar-docker-en-ubuntu-16-04-es (ubuntu - linux)

https://voragine.net/weblogs/instalar-docker-en-debian-jessie (debian - linux)

https://docs.docker.com/docker-for-windows/install/#download-docker-for-windows (windows)
```

### Clonar el repositorio

Debemos ejecutar el siguiente comando 

```
git clone https://github.com/FranciscoJBL/test
```

Se nos creará una carpeta llamada test que contiene el proyecto.

Antes de entar a esta carpeta debemos crear un archivo docker-compose.yml, el cual servirá de guía para que docker levante el proyecto. Para esto creamos un nuevo archivo, lo abrimos con cualquier editor de text y escribimos
```
version: '2'
services:
  core:
    build: 
      context: ./test/
    volumes:
      - ./test/:/var/www/html/
    ports:
      - 12345:80
```

NOTA: no se recomienda realizar cambios en este archivo a excepción del puerto.

Nos dirigimos a la carpeta del proyecto

```
cd test
```

y levantamos el docker

```
docker-compose up --build
```

con esto ya deberiamos tener lista nuestra imagen en docker.

### Instalar dependencias

Para instalar las depencias necesarias, debemos dirigirnos a la carpeta del proyecto y escribir el siguiente comando

```
make bash
```

Con esto ingresamos a la imagen que tenemos corriendo en nuestro servidor, luego instalamos con composer
```
php composer.phar install
```

```
php composer.phar update
```

### Twig

Para el manejo de las vistas, la aplicación usa la libreria Twig, esta se instala automáticamente por medio del composer, pero adicionalmente a esto tenemos que crear la carpeta de cache y darle los permisos necesarios, lo podemos hacer desde el mismo archivo make:

Si estamos en bash (make bash) debemos salir
```
exit
```


una vez afuera, ejecutamos el make correspondiente para crear el directorio
```
make twig
```
### Ejecutar el proyecto

Una vez levantada la imagen, el proyecto deberia correr en (cambiar el puerto según los cambios realizados en docker-compose.yml):
```
http://localhost:12345/
```

y los test unitarios en:

```
http://localhost:12345/unit/test
```


Ante cualquier duda/consulta respecto al proyecto, dependencias o instalación, favor contactar a francisco.briones.l@gmail.com