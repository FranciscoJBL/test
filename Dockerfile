FROM php:7.0-apache

COPY application/ /var/www/html/

	RUN buildDeps=" \
        libbz2-dev \
        libmemcached-dev \
        libmysqlclient-dev \
        libsasl2-dev \
    " \
    runtimeDeps=" \
        curl \
	unzip \
	poppler-utils \
        libfreetype6-dev \
        libicu-dev \
        libjpeg-dev \
        libmcrypt-dev \
        libmemcachedutil2 \
        libpng12-dev \
        libpq-dev \

    " \
	&& apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y $buildDeps $runtimeDeps \
	&& docker-php-ext-install gd \
	&& pecl install memcached redis \
    && docker-php-ext-enable memcached.so redis.so \
    && a2enmod rewrite
