document.addEventListener('DOMContentLoaded', () => {
    // Validación de contraseña
    function validatePassword(password) {
        const minLength = 10;
        const hasUpperCase = /[A-Z]/.test(password);
        const hasLowerCase = /[a-z]/.test(password);
        const hasNumber = /\d/.test(password);
        const hasSymbol = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password);

        return password.length >= minLength && hasUpperCase && hasLowerCase && hasNumber && hasSymbol;
    }

    // Manejo del envío del formulario de registro
    function handleSubmit(event) {
        event.preventDefault();
        const recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            alert('Por favor, complete el reCAPTCHA');
            return;
        }

        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (!validatePassword(password)) {
            alert("La contraseña debe tener al menos 10 caracteres, una letra mayúscula, una minúscula, un número y un símbolo.");
            return;
        }

        if (password !== passwordConfirmation) {
            alert("Las contraseñas no coinciden");
            return;
        }

        // Aquí iría la lógica para enviar el formulario con el token de reCAPTCHA
        console.log('Formulario de registro enviado con éxito');
        // Puedes agregar aquí el código para enviar los datos al servidor
    }

    // Validación y envío del formulario de contacto
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Obtención y sanitización de los valores del formulario
            const nombre = contactForm.querySelector('input[name="nombre"]').value.trim();
            const correo = contactForm.querySelector('input[name="correo"]').value.trim();
            const mensaje = contactForm.querySelector('textarea[name="mensaje"]').value.trim();

            // Validación del campo "nombre"
            if (nombre === '') {
                alert('Por favor, ingrese su nombre.');
                return;
            }

            // Validación del campo "correo" utilizando una expresión regular
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(correo)) {
                alert('Por favor, ingrese una dirección de correo electrónico válida.');
                return;
            }

            // Validación del campo "mensaje" excluyendo los caracteres peligrosos
            const messageRegex = /^[a-zA-Z0-9\s.,:;!?()-]*$/;
            if (!messageRegex.test(mensaje)) {
                alert('El mensaje contiene caracteres no permitidos. Solo se permiten letras, números y los siguientes símbolos: .,:;!?()-');
                return;
            }

            // Validación adicional para asegurar que el mensaje no esté vacío
            if (mensaje === '') {
                alert('Por favor, ingrese un mensaje.');
                return;
            }

            // Si todas las validaciones pasan, se envía el formulario
            alert('Formulario enviado correctamente. Gracias por contactarnos!');
            contactForm.reset();
        });
    }

    // Funcionalidad de toggle de contraseña (muestra/oculta la contraseña)
    const passwordToggles = document.querySelectorAll('.password-toggle');
    passwordToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    });

    // Validación de formulario de inicio de sesión
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (grecaptcha && grecaptcha.getResponse() == "") {
                alert("Por favor, completa el captcha");
                return false;
            }
            this.submit();
        });
    }

    // Validación de formulario de registro
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', handleSubmit);
    }

    // Funcionalidad para agendar cita
    const appointmentForm = document.getElementById('appointment-form');
    if (appointmentForm) {
        appointmentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Aquí puedes añadir validaciones adicionales si es necesario
            this.submit();
        });
    }

    // Resaltar la navegación activa según la sección visible
    const navLinks = document.querySelectorAll('nav ul li a');
    const sections = document.querySelectorAll('section');

    function makeNavLinkBold() {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (scrollY >= sectionTop - 60 && scrollY < sectionTop + sectionHeight - 60) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('activo');
            if (link.getAttribute('href').slice(1) === current) {
                link.classList.add('activo');
            }
        });
    }

    window.addEventListener('scroll', makeNavLinkBold);
    makeNavLinkBold();

    // Funcionalidad para botones "Agenda tu hora"
    const agendarButtons = document.querySelectorAll('.agenda-hora');
    agendarButtons.forEach(button => {
        button.addEventListener('click', () => {
            window.location.href = 'agendar.html';
        });
    });

    // Funcionalidad para mostrar el botón de scroll cuando se desplaza hacia abajo
    function scrollFunction() {
        const scrollTopButton = document.getElementById("scrollTopButton");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
        } else {
            scrollTopButton.style.display = "none";
        }
    }

    window.addEventListener('scroll', scrollFunction);

    // Funcionalidad para volver al tope de la página
    window.scrollToTop = function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
    
    // Menú móvil: Mostrar/Ocultar navegación
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('nav ul');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }

    // Función para manejar el envío del formulario de recuperación de contraseña
    function handleRecuperarSubmit(event) {
        event.preventDefault();
        const recaptchaResponse = grecaptcha.getResponse();
        if (!recaptchaResponse) {
            alert('Por favor, complete el reCAPTCHA');
            return false;
        }

        const email = document.getElementById('email').value;
        
        // Aquí iría la lógica para enviar la solicitud de recuperación de contraseña
        console.log('Solicitud de recuperación de contraseña enviada para:', email);
        alert('Se ha enviado un correo electrónico con instrucciones para recuperar su contraseña.');
        
        // Resetear el formulario y el captcha
        document.getElementById('recuperar-form').reset();
        grecaptcha.reset();

        return false;
    }

    // Agregar el event listener para el formulario de recuperación de contraseña
    const recuperarForm = document.getElementById('recuperar-form');
    if (recuperarForm) {
        recuperarForm.addEventListener('submit', handleRecuperarSubmit);
    }
});