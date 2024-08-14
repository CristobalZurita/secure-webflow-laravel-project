# Informe del Proceso de Desarrollo de la Plataforma Nutribite

## Introducción

El desarrollo de Nutribite, una plataforma web dedicada a soluciones de nutrición y bienestar, comenzó con una idea clara: crear un sitio web funcional, seguro y visualmente atractivo que cumpliera con las expectativas de los usuarios y del equipo de desarrollo. Este informe detalla el proceso completo, desde la planificación inicial hasta las etapas de desarrollo, seguridad, despliegue y los desafíos técnicos enfrentados.

## 1. Planificación y Diseño

### 1.1 Planificación Inicial

La primera etapa en el desarrollo de Nutribite consistió en la planificación del proyecto. Esta fase fue crucial para definir los objetivos, las funcionalidades y los requisitos técnicos necesarios para la implementación de la plataforma. Aunque no se siguió una metodología de desarrollo formal como Agile o Waterfall, el enfoque iterativo y paralelo permitió avanzar en varios aspectos del proyecto simultáneamente.

### 1.2 Diseño de la Interfaz

El diseño de la interfaz de usuario fue una prioridad desde el inicio del proyecto. Se realizaron múltiples iteraciones centradas en la estética y la usabilidad, con el objetivo de crear una experiencia intuitiva para los usuarios. Durante esta fase, se exploraron diferentes paletas de colores, tipografías, y layouts para garantizar que el sitio no solo fuera funcional, sino también visualmente atractivo.

Se utilizaron herramientas como **Figma** para la creación de prototipos y **Adobe XD** para la definición de flujos de usuario. Estos prototipos sirvieron como base para la implementación de las interfaces en HTML, CSS y JavaScript.

## 2. Integración de XAMPP en Linux

### 2.1 Selección de Herramientas

Para el desarrollo de Nutribite, se optó por utilizar **XAMPP en un entorno Linux** debido a su flexibilidad y facilidad de uso. XAMPP incluye Apache, MariaDB y PHP, que son esenciales para ejecutar aplicaciones web dinámicas. La elección de XAMPP en Linux proporcionó un entorno de desarrollo local robusto y bien soportado, ideal para el tipo de proyecto que se tenía en mente.

### 2.2 Configuración de XAMPP

La instalación y configuración de XAMPP en Linux se realizó de manera estándar, asegurando que todas las dependencias estuvieran correctamente instaladas y configuradas. Esto incluyó:

- **Apache:** Configuración del servidor web para manejar las peticiones HTTP/S de manera eficiente.
- **MariaDB:** Se decidió reemplazar MySQL por MariaDB debido a sus mejoras en rendimiento y seguridad. La base de datos fue configurada para aceptar conexiones desde la aplicación Laravel.
- **PHP:** Configuración de PHP para asegurar la compatibilidad con Laravel y las extensiones necesarias como `pdo_mysql`, `mbstring`, y `openssl`.

Además, se integraron herramientas adicionales para facilitar el desarrollo:

- **DBeaver:** Para la gestión visual de bases de datos, facilitando las consultas SQL y la administración de esquemas.
- **Composer:** Para la gestión de dependencias de PHP, asegurando que todas las bibliotecas necesarias estuvieran actualizadas.
- **Laravel:** Framework elegido para la estructura y el desarrollo backend de Nutribite.

## 3. Instalación y Configuración del Entorno

### 3.1 Preparación del Entorno de Desarrollo

La preparación del entorno de desarrollo comenzó con la instalación de XAMPP en Linux. Este entorno fue seleccionado por su simplicidad y por la facilidad que ofrece para replicar entornos de producción en un servidor local. Los pasos incluyeron:

1. **Descarga e instalación de XAMPP:** 
    ```bash
    wget https://www.apachefriends.org/xampp-files/7.4.29/xampp-linux-x64-7.4.29-1-installer.run
    sudo chmod +x xampp-linux-x64-7.4.29-1-installer.run
    sudo ./xampp-linux-x64-7.4.29-1-installer.run
    ```

2. **Inicio de servicios de Apache y MariaDB:**
    ```bash
    sudo /opt/lampp/lampp start
    ```

3. **Configuración de Apache para Laravel:**
    - Se ajustaron las configuraciones de Apache para apuntar al directorio `public` de Laravel, asegurando que todas las rutas fueran gestionadas correctamente por el framework.

### 3.2 Instalación de Dependencias

Se procedió con la instalación de todas las dependencias necesarias para el proyecto Nutribite:

1. **Instalación de Composer:**
    ```bash
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer
    ```

2. **Instalación de Laravel:**
    ```bash
    composer global require laravel/installer
    laravel new nutribite
    ```

3. **Instalación de Node.js y npm para Laravel Mix:**
    ```bash
    sudo apt install nodejs npm
    cd nutribite
    npm install
    npm run dev
    ```

4. **Configuración del archivo `.env`:**
    - Se duplicó el archivo `.env.example` y se configuraron las variables de entorno necesarias, incluyendo las credenciales de la base de datos y las claves secretas para las APIs.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nutribite
    DB_USERNAME=root
    DB_PASSWORD=
    ```

### 3.3 Migraciones y Seeders

Se ejecutaron las migraciones y seeders para preparar la base de datos:

```bash
php artisan migrate
php artisan db:seed
```

Estas acciones permitieron la creación automática de las tablas necesarias en la base de datos y la inserción de datos iniciales para pruebas.

## 4. Desarrollo y Seguridad

### 4.1 Implementación de Medidas de Seguridad

La seguridad fue un aspecto crítico del desarrollo de Nutribite. A lo largo del proyecto, se implementaron varias medidas de seguridad para proteger la integridad de los datos y la seguridad de los usuarios:

- **Autenticación de Dos Factores (2FA):** Se configuró utilizando servicios como Google Authenticator para añadir una capa adicional de protección en el inicio de sesión.
- **Sanitización de Entradas:** Se aseguraron todas las entradas del usuario utilizando técnicas de sanitización para prevenir ataques de inyección SQL y XSS.
- **ReCAPTCHA:** Implementado en los formularios clave para evitar el uso indebido por parte de bots y automatizaciones maliciosas.
  
Cada una de estas medidas fue cuidadosamente integrada y probada en el entorno local para garantizar su efectividad antes de planificar cualquier despliegue en producción.

### 4.2 Consideraciones Adicionales de Seguridad

A pesar de no haber alcanzado la fase de despliegue completo, se planificaron medidas adicionales como la configuración de un **firewall** y la implementación de **certificados SSL** para cifrar las comunicaciones entre los usuarios y el servidor.

## 5. Despliegue Local y Limitaciones

### 5.1 Despliegue en Entorno Local

El despliegue de Nutribite se realizó exclusivamente en un entorno local utilizando XAMPP en Linux. Este entorno permitió una implementación rápida y eficiente de las funcionalidades desarrolladas, facilitando la detección y corrección de errores en tiempo real.

### 5.2 Limitaciones Encontradas

Aunque el despliegue local fue exitoso, no se completó la migración a un servidor de producción. Esto dejó algunas funcionalidades planificadas sin implementar, como la configuración avanzada de seguridad para un entorno en vivo y las optimizaciones de rendimiento necesarias para soportar una mayor carga de usuarios.

## 6. Investigación y Desarrollo

### 6.1 Proceso de Investigación

Dado que muchas de las tecnologías y herramientas utilizadas en Nutribite eran nuevas para el equipo, se dedicó un tiempo considerable a la investigación. Esto incluyó la lectura de documentación, la realización de pruebas de concepto y la implementación de prototipos. El esfuerzo invertido en esta fase fue clave para superar los desafíos técnicos y asegurar que la plataforma se construyera sobre bases sólidas.

### 6.2 Desarrollo Continuo

El desarrollo de Nutribite fue un proceso iterativo, donde se fueron añadiendo y refinando funcionalidades a medida que el proyecto avanzaba. Aunque no se completaron todas las etapas planificadas, el trabajo realizado sentó una base sólida para futuras expansiones y mejoras.

## Conclusión

El desarrollo de Nutribite fue un proyecto ambicioso que combinó planificación, diseño, desarrollo técnico y medidas de seguridad en un entorno controlado. Aunque el proyecto no llegó a completarse en su totalidad, los avances logrados representan un esfuerzo significativo en la creación de una plataforma robusta y segura. Este informe refleja el compromiso y la dedicación del equipo para ofrecer un producto de calidad, con la vista puesta en futuras mejoras y despliegues.
