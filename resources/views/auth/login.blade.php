<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso - Nutribite</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://use.typekit.net/apl6lau.css">
</head>
<body>
    <header class="sticky">
        <div class="header-content">
            <h1>Ingreso</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="ingreso.html" class="active">Ingreso</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="login-container section-content">
        <section class="login-left">
            <div class="login-left-content">
                <img src="/public/images/brocoli.png" alt="Brócoli" class="background-image">
                <h2 class="login-title">Nutribite</h2>
                <p class="login-subtitle">Salud y cuidado en tu hogar</p>
            </div>
            <div class="contact-info">
                <p>contacto@nutribite.com</p>
                <p>soporte@nutribite.com</p>
                <p>Mesa de ayuda: (+56) 9 9999 9999</p>
                <p>Avenida Pedro Montt 2930, piso 2 oficina 201, Valparaíso.</p>
            </div>
        </section>

        <section class="login-right">
            <form class="login-form" onsubmit="handleSubmit(event)">
                <div class="form-group">
                    <label for="email">Usuario</label>
                    <input type="email" id="email" placeholder="Correo electrónico" required>
                </div>
                <div class="form-group relative">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                    <button type="button" class="password-toggle" aria-label="Toggle password visibility">👁️</button>
                </div>
                <div class="g-recaptcha" data-sitekey="6Le9sR0qAAAAAFH15LWT_CiSU-8ssw6WdizUjz0i"></div>
                <button type="submit" class="login-button cta-button">Iniciar sesión</button>
            </form>
            <div class="login-links">
                <a href="#">Recordar contraseña</a>
                <a href="#">Crear Usuario Nuevo</a>
                <a href="#">Olvidé mi contraseña</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Nutribite. Todos los derechos reservados.</p>
    </footer>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js/main.js"></script>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        }

        function handleSubmit(event) {
            event.preventDefault();
            const recaptchaResponse = grecaptcha.getResponse();
            if (recaptchaResponse) {
                // Aquí iría la lógica para enviar el formulario con el token de reCAPTCHA
                console.log('Formulario enviado con éxito');
            } else {
                alert('Por favor, complete el reCAPTCHA');
            }
        }
    </script>
</body>
</html>