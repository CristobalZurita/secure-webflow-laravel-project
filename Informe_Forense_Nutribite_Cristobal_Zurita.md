# Informe Forense: Análisis de Ataque Cibernético a Infraestructura Crítica de Nutribite

## Portada

[Insertar logos corporativos aquí]

## Resumen Ejecutivo

Este informe presenta los resultados de un análisis forense exhaustivo realizado sobre la infraestructura crítica del proyecto Nutribite, que ha sufrido un ataque cibernético significativo. El objetivo principal fue identificar las vulnerabilidades explotadas, recolectar evidencias y determinar la extensión del compromiso, con el fin de proponer mejoras para fortalecer la seguridad cibernética en futuras implementaciones.

## Introducción

El proyecto Nutribite, una aplicación web de nutrición y bienestar, ha sido seleccionado como parte de una nueva alianza Chile-México en ciberseguridad. Durante la fase de implementación, se detectó un ataque cibernético que comprometió parte de la infraestructura crítica del proyecto, afectando la confidencialidad, integridad y disponibilidad de los datos manejados por la plataforma.

## Antecedentes del Caso

Nutribite es una aplicación web desarrollada con el framework Laravel, enfocada en proporcionar servicios de nutrición y bienestar. El proyecto forma parte de una iniciativa más amplia financiada por el Fondo Conjunto de Cooperación Chile-México para mejorar la seguridad cibernética en infraestructuras críticas. La aplicación maneja información sensible de usuarios, por lo que la seguridad es un componente crítico.

## Objetivos del Análisis

1. Identificar las vulnerabilidades explotadas en el ataque.
2. Recolectar y analizar evidencias digitales del incidente.
3. Determinar la extensión del compromiso en los sistemas afectados.
4. Proponer recomendaciones para mejorar la seguridad y prevenir futuros ataques.

## Metodología

### 1. Configuración Inicial y Preparación (30 minutos)

- **Objetivo**: Configurar el entorno de trabajo y preparar todas las herramientas necesarias para el análisis forense.
- **Actividades**:
  - Revisión del archivo `.env` para entender la configuración del entorno.
  - Examen de los archivos en `config/` (e.g., `config/app.php`) para revisar configuraciones críticas.
  - Clonación del repositorio de GitHub donde se entregará el informe.

### 2. Captura y Análisis de Tráfico de Red (60 minutos)

- **Objetivo**: Capturar y analizar el tráfico de red para identificar actividad sospechosa y posibles puntos de entrada del atacante.
- **Actividades**:
  - Utilizar Wireshark para capturar tráfico de red en tiempo real.
  - Analizar los logs de acceso del servidor web (buscar en `storage/logs/`).
  - Revisar la configuración de rutas en `routes/web.php` y `routes/api.php`.

### 3. Análisis del Sistema Comprometido (60 minutos)

- **Objetivo**: Realizar un análisis detallado de los sistemas comprometidos para identificar artefactos de ataque y evaluar la integridad de los sistemas.
- **Actividades**:
  - Revisar los archivos de controladores en `app/Http/Controllers/` para identificar código sospechoso.
  - Examinar los modelos en `app/Models/` y los middlewares en `app/Http/Middleware/` para buscar posibles vulnerabilidades.

### 4. Adquisición de Imágenes Forenses y Custodia de Evidencias (45 minutos)

- **Objetivo**: Adquirir imágenes forenses de los sistemas comprometidos y documentar la cadena de custodia.
- **Actividades**:
  - Crear copias de seguridad de los archivos críticos, incluyendo logs y bases de datos.
  - Documentar detalladamente cada paso del proceso de adquisición de imágenes forenses.

### 5. Elaboración del Informe Forense (45 minutos)

- **Objetivo**: Redactar un informe forense detallado que incluya todos los hallazgos, análisis y recomendaciones para mejorar la seguridad.
- **Actividades**:
  - Estructurar el informe utilizando los datos recolectados y documentados.
  - Discutir el impacto del ataque en el contexto del proyecto Nutribite.
  - Proponer recomendaciones para mejorar la ciberseguridad en futuros proyectos.

### 6. Entrega y Presentación (30 minutos)

- **Objetivo**: Finalizar y entregar el informe forense mediante GitHub y preparar una breve presentación de los hallazgos clave.
- **Actividades**:
  - Realizar un commit final y push del informe en Markdown al repositorio de GitHub.
  - Presentar los hallazgos clave a los instructores y compañeros.
