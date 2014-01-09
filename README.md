caja-pandora
============

Software para analisis de libros de textos


Instalación
===========

Clonar el proyecto:

    git clone https://github.com/jag2kn/caja-pandora.git

Entrar en el directorio

    cd caja-pandora

Crear la base de datos

    mysql -u root -p -e "create database analisisateo;"

Cargar la base de datos

    mysql -u root -p analisisateo < analisis_biblico.sql

Descargar composer.phar

    curl -sS https://getcomposer.org/installer | php

Instalar dependencias

    php composer.phar update

Correr servidor de desarrollo

    php app/console server:run


