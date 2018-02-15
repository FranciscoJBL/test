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

Luego, en la carpeta donde descargamos el proyecto, hacer:

```
docker-compose up --build
```

con esto ya deberiamos haber levantado nuestra imagen en docker.

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

### Ejecutar el proyecto

Una vez levantada la imagen, el proyecto deberia correr en:
```
http://localhost:12345/
```

y los test unitarios en:

```
http://localhost:12345/unit/test
```


Si se tiene cualquier duda con alguno de estos pasos, favor no dudar en contactar