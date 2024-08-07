document.addEventListener('DOMContentLoaded', () => {
    // Funcionalidad de toggle de contraseña
    const passwordToggle = document.querySelector('.password-toggle');
    const passwordInput = document.getElementById('password');
    
    if (passwordToggle && passwordInput) {
        passwordToggle.textContent = '👁️';
        
        passwordToggle.addEventListener('click', function() {
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
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (grecaptcha && grecaptcha.getResponse() == "") {
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

    // Navegación activa
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
    const agendarButtons = document.querySelectorAll('.agenda-hora');
    agendarButtons.forEach(button => {
        button.addEventListener('click', () => {
            window.location.href = 'agendar.html';
        });
    });

    // Validación y envío del formulario de contacto
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const nombre = contactForm.querySelector('input[name="nombre"]').value.trim();
            const correo = contactForm.querySelector('input[name="correo"]').value.trim();
            const telefono = contactForm.querySelector('input[name="telefono"]').value.trim();
            const mensaje = contactForm.querySelector('textarea[name="mensaje"]').value.trim();

            if (nombre === '') {
                alert('Por favor, ingrese su nombre.');
                return;
            }

            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(correo)) {
                alert('Por favor, ingrese una dirección de correo electrónico válida.');
                return;
            }

            if (telefono !== '') {
                const phoneRegex = /^\+[0-9]{11,}$/;
                if (!phoneRegex.test(telefono)) {
                    alert('Por favor, ingrese un número de teléfono válido (formato: +56982859548).');
                    return;
                }
            }

            if (mensaje === '') {
                alert('Por favor, ingrese un mensaje.');
                return;
            }

            alert('Formulario enviado correctamente. Gracias por contactarnos!');
            contactForm.reset();
        });
    }

    // Funcionalidad para mostrar el botón de scroll
    function scrollFunction() {
        var scrollTopButton = document.getElementById("scrollTopButton");
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
    
    // Menú móvil
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('nav ul');

    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
});