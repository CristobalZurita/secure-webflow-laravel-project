document.addEventListener('DOMContentLoaded', () => {
    console.log("JavaScript cargado correctamente");

    // Funcionalidad para mostrar/ocultar contraseña
    const passwordToggle = document.querySelector('.password-toggle');
    if (passwordToggle) {
        passwordToggle.addEventListener('click', function() {
            const passwordInput = this.previousElementSibling;
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    }

    // Validación de formulario de inicio de sesión
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (grecaptcha.getResponse() == "") {
                alert("Por favor, completa el captcha");
                return false;
            }
            this.submit();
        });
    }

    // Validación de formulario de registro
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (grecaptcha.getResponse() == "") {
                alert("Por favor, completa el captcha");
                return false;
            }
            if (this.password.value !== this.password_confirmation.value) {
                alert("Las contraseñas no coinciden");
                return false;
            }
            this.submit();
        });
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
            link.classList.remove('active');
            if (link.getAttribute('href').slice(1) === current) {
                link.classList.add('active');
            }
        });
    }

    window.addEventListener('scroll', makeNavLinkBold);
    makeNavLinkBold();

    // Funcionalidad para botones "Agenda tu hora"
    const agendarButtons = document.querySelectorAll('.cta-button');
    agendarButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Funcionalidad de agendar hora aún no implementada');
        });
    });

    // Validación y envío del formulario de contacto
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Validación del correo electrónico
            const emailInput = contactForm.querySelector('input[name="correo"]');
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            
            if (!emailRegex.test(emailInput.value)) {
                alert('Por favor, ingrese una dirección de correo electrónico válida.');
                return;
            }

            // Verificación del reCAPTCHA
            const response = grecaptcha.getResponse();
            if (response.length === 0) {
                alert('Por favor, complete el reCAPTCHA.');
                return;
            }

            // Si todo está bien, envía el formulario
            alert('Formulario enviado correctamente. Gracias por contactarnos!');
            contactForm.reset();
            grecaptcha.reset();
        });
    }

    // Funcionalidad para mostrar el botón de scroll
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        var scrollTopButton = document.getElementById("scrollTopButton");
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
        } else {
            scrollTopButton.style.display = "none";
        }
    }

    // Funcionalidad para volver al tope de la página
    window.scrollToTop = function() {
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
});
