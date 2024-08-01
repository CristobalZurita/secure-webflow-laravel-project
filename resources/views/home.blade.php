<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutribite</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://use.typekit.net/apl6lau.css">
</head>
<body>
    <header class="sticky">
        <div class="header-content">
            <h1>SALUD, NUTRICIÓN Y BIENESTAR</h1>
            <nav>
                <ul>
                    <li><a href="#home" class="active">Home</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#especialistas">Especialistas</a></li>
                    <li><a href="#planes">Planes</a></li>
                    <li><a href="#promociones">Promociones</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                    <li><a href="#ingreso-especialistas" class="ingreso">Ingreso Especialistas</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="home">
        <div class="section-content">
            <h2>Bienvenido a Nutribite</h2>
            <p>Nutribite es una web amigable de nutrición que te ayuda a comer sano y sentirte bien...</p>
            <button>Agenda tu hora</button>
        </div>
    </section>
    <section id="nosotros">
        <div class="section-content">
            <h2>Nosotros</h2>
            <p>Nutribite es una web amigable de nutrición que te ayuda a comer sano y sentirte bien...</p>
            <button>Agenda tu hora</button>
        </div>
    </section>
    <section id="especialistas">
        <div class="section-content">
            <h2>Especialistas</h2>
            <div class="specialist-card">
                <img src="{{ asset('images/monica.png') }}" alt="Mónica Muñoz">
                <h3>Mónica Muñoz</h3>
                <p>Experta en trastornos alimenticios en niños y adolescentes...</p>
            </div>
        </div>
    </section>
    <section id="planes">
        <div class="section-content">
            <h2>Planes</h2>
            <div class="plan-card">
                <h3>Plan Personal</h3>
                <p>Personalizado, online y presencial...</p>
            </div>
        </div>
    </section>
    <section id="promociones">
        <div class="section-content">
            <h2>Promociones</h2>
            <div class="promo-card">
                <h3>IMC Gratis</h3>
                <p>Mide tu IMC de manera online...</p>
            </div>
        </div>
    </section>
    <section id="contacto">
        <div class="section-content">
            <h2>Contacto</h2>
            <form>
                <input type="text" name="nombre" placeholder="Nombre">
                <input type="email" name="correo" placeholder="Correo">
                <input type="text" name="telefono" placeholder="Teléfono">
                <textarea name="mensaje" placeholder="Mensaje"></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Nutribite. Todos los derechos reservados.</p>
    </footer>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
