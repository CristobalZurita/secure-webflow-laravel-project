<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutribite - Salud y cuidado en tu hogar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('images/nutribite-logo.png') }}" alt="Nutribite Logo" class="logo">
            <h1>Nutribite</h1>
            <p>Salud y cuidado en tu hogar</p>
        </div>
        <nav>
            <ul>
                <li><a href="#home" class="active">Home</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#especialistas">Especialistas</a></li>
                <li><a href="#planes">Planes</a></li>
                <li><a href="#promociones">Promociones</a></li>
                <li><a href="#contacto">Contacto</a></li>
                <li><a href="{{ route('login') }}" class="ingreso">Ingreso Especialistas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>SALUD, NUTRICIÓN Y BIENESTAR</h2>
            <p>Nutribite es una web amigable de nutrición que te ayuda a comer sano y sentirte bien. Encuentra consejos, recetas y planes personalizados para mejorar tu bienestar. ¡Descubre una vida más saludable con Nutribite!</p>
            <button class="cta-button">Agenda tu hora</button>
            <div class="food-images">
                <img src="{{ asset('images/food1.jpg') }}" alt="Comida saludable 1">
                <img src="{{ asset('images/food2.jpg') }}" alt="Comida saludable 2">
            </div>
        </section>

        <section id="opiniones">
            <h2>¿Qué opina la gente de Nutribite?</h2>
            <div class="opinion-cards">
                <div class="opinion-card">
                    <h3>Planes a medida</h3>
                    <p>Encontré el plan nutricional gracias al asesoramiento de Nutribite y sus excelentes profesionales.</p>
                    <div class="stars">★★★★★</div>
                    <div class="user-info">
                        <img src="{{ asset('images/user1.jpg') }}" alt="Jane Doe">
                        <p>Jane Doe<br>Ingeniera civil.</p>
                    </div>
                </div>
                <div class="opinion-card">
                    <h3>Telemedicina</h3>
                    <p>Dispongo de poco tiempo, por lo que hago las sesiones online desde la oficina, es lo que buscaba.</p>
                    <div class="stars">★★★★★</div>
                    <div class="user-info">
                        <img src="{{ asset('images/user2.jpg') }}" alt="Robberto Bolaño">
                        <p>Robberto Bolaño<br>Escritor.</p>
                    </div>
                </div>
                <div class="opinion-card">
                    <h3>Alianza con Gym's</h3>
                    <p>Todos los planes de Nutribite permiten acceso a una extensa red de gimnasios.</p>
                    <div class="stars">★★★★★</div>
                    <div class="user-info">
                        <img src="{{ asset('images/user3.jpg') }}" alt="Nadia Boulanger">
                        <p>Nadia Boulanger<br>Pianista y Compositora.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="especialistas">
            <h2>Especialistas</h2>
            <div class="specialist-cards">
                <div class="specialist-card">
                    <img src="{{ asset('images/monica.jpg') }}" alt="Mónica Muñoz">
                    <h3>Mónica Muñoz</h3>
                    <p>Experta en trastornos alimenticios en niños y adolescentes. Más de 15 años de experiencia</p>
                </div>
                <div class="specialist-card">
                    <img src="{{ asset('images/oscar.jpg') }}" alt="Oscar Andrade">
                    <h3>Oscar Andrade</h3>
                    <p>Experto en problemas gástricos, desnutrición. Cuenta con más de 40 años de experiencia.</p>
                </div>
                <div class="specialist-card">
                    <img src="{{ asset('images/camila.jpg') }}" alt="Camila Saavedra">
                    <h3>Camila Saavedra</h3>
                    <p>Experta en adulto mayor y tercera edad. Cuenta con más de 10 años de experiencia.</p>
                </div>
            </div>
        </section>

        <section id="contacto">
            <h2>Contacto</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Nutribite</h3>
                    <p>Contact us for questions, technical assistance, or collaboration opportunities via the contact information provided.</p>
                    <ul>
                        <li>+123-456-7890</li>
                        <li>hello@reallygreatsite.com</li>
                        <li>123 Anywhere ST., Any City, 12345</li>
                    </ul>
                    <button class="cta-button">Agenda tu hora</button>
                </div>
                <form class="contact-form" id="contactForm">
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <input type="email" name="correo" placeholder="Correo" required>
                    <input type="tel" name="telefono" placeholder="Teléfono">
                    <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                    <div class="g-recaptcha" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
                    <button type="submit">ENVIAR</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>contacto@nutribite.com | soporte@nutribite.com</p>
            <p>Mesa de ayuda: (+56) 9 9999 9999</p>
            <p>Avenida Pedro Montt 2930, piso 2 oficina 201, Valparaíso.</p>
            <p>&copy; 2024 Nutribite. Todos los derechos reservados.</p>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>