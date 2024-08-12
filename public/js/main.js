document.addEventListener('DOMContentLoaded', () => {
    // Sanitización básica de entradas de texto
    function sanitizeInput(input) {
        return input.replace(/[^\w\s@.,:;!?()-]/g, '').trim();
    }

    // Validación de campos
    function validateField(value, regex, errorMsg) {
        if (!regex.test(value)) {
            alert(errorMsg);
            return false;
        }
        return true;
    }

    // Validación y envío del formulario de contacto
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const nombre = sanitizeInput(contactForm.querySelector('input[name="nombre"]').value);
            const correo = sanitizeInput(contactForm.querySelector('input[name="correo"]').value);
            const mensaje = sanitizeInput(contactForm.querySelector('textarea[name="mensaje"]').value);

            if (!validateField(nombre, /^[a-zA-Z\s'-]+$/, 'El nombre solo puede contener letras, espacios, apóstrofos y guiones.') ||
                !validateField(correo, /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, 'Por favor, ingrese una dirección de correo electrónico válida.') ||
                !validateField(mensaje, /^[a-zA-Z0-9\s.,:;!?()-]*$/, 'El mensaje contiene caracteres no permitidos.')) {
                return;
            }

            alert('Formulario enviado correctamente. Gracias por contactarnos!');
            contactForm.reset();
        });
    }

    // Validación y envío del formulario de registro
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                alert('Por favor, complete el reCAPTCHA');
                return;
            }

            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;
            const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]).{10,}$/;

            if (!validateField(password, passwordRegex, "La contraseña debe tener al menos 10 caracteres, una letra mayúscula, una minúscula, un número y un símbolo.") ||
                password !== passwordConfirmation) {
                alert("Las contraseñas no coinciden");
                return;
            }

            alert('Formulario de registro enviado con éxito');
            registerForm.submit();
        });
    }

    // Toggle de contraseña
    document.querySelectorAll('.password-toggle').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const input = this.previousElementSibling;
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    });

    // Resaltar la navegación activa según la sección visible
    const navLinks = document.querySelectorAll('nav ul li a');
    const sections = document.querySelectorAll('section');

    function highlightNav() {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (scrollY >= sectionTop - 60 && scrollY < sectionTop + section.clientHeight - 60) {
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

    window.addEventListener('scroll', highlightNav);
    highlightNav();

    // Botón para volver al tope de la página
    const scrollTopButton = document.getElementById("scrollTopButton");
    window.addEventListener('scroll', () => {
        scrollTopButton.style.display = document.documentElement.scrollTop > 20 ? "block" : "none";
    });

    window.scrollToTop = function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    // Menú móvil: Mostrar/Ocultar navegación
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('nav ul');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
});
