document.addEventListener('DOMContentLoaded', () => {
    // Función de Sanitización Global
    function sanitizeInput(input, type) {
        switch(type) {
            case 'nombre':
                return input.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '').trim();
            case 'telefono':
                return input.replace(/[^0-9+]/g, '').trim(); // Solo permitir números
            case 'rut':
                return input.replace(/[^0-9kK]/g, '').trim();
            case 'mensaje':
                return input.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\.,¿?]/g, '').trim();
            default:
                return input.trim();
        }
    }

    // Función de Validación Global
    function validateField(input, regex, errorMsg) {
        const sanitizedValue = sanitizeInput(input.value, input.name);

        if (!regex.test(sanitizedValue)) {
            alert(errorMsg);
            input.focus();
            return false;
        }

        input.value = sanitizedValue;
        return true;
    }
// Aplicar Sanitización y Validación a Todos los Formularios en la Página
document.querySelectorAll('form').forEach((form) => {
    form.addEventListener('submit', (e) => {
        let isValid = true;
        form.querySelectorAll('input[type="text"], input[type="email"], textarea').forEach((input) => {
            if (input.name === 'nombre') {
                if (!validateField(input, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/, 'El nombre solo puede contener letras y espacios.')) {
                    isValid = false;
                }
            } else if (input.name === 'telefono') {
                if (!input.value.startsWith("+56")) {
                    input.value = "+56" + sanitizeInput(input.value, 'telefono');
                }
                if (!validateField(input, /^\+56\d{9}$/, 'El teléfono debe comenzar con +56 y seguir con 9 dígitos.')) {
                    isValid = false;
                }
            } else if (input.name === 'rut') {
                if (!validateField(input, /^\d{7,8}[kK\d]$/, 'El RUT debe ser un número seguido por k o K si corresponde.')) {
                    isValid = false;
                }
            } else if (input.name === 'correo') {
                if (!validateField(input, /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/, 'Por favor, ingrese una dirección de correo electrónico válida.')) {
                    isValid = false;
                }
            } else if (input.name === 'mensaje') {
                if (!validateField(input, /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\.,¿?]+$/, 'El mensaje solo puede contener letras, números, signos de pregunta, comas, puntos y acentos en las vocales.')) {
                    isValid = false;
                }
            }
        });

        // Validación específica para la página de Agenda tu Hora
        if (form.id === 'reserva-form') {
            const tipoConsulta = form.querySelector('select[name="tipoConsulta"]');
            const especialidad = form.querySelector('select[name="especialidad"]');
            const centroAtencion = form.querySelector('select[name="centroAtencion"]');
            const selectedTimeSlot = form.querySelector('.time-slot.selected');
            if (tipoConsulta && tipoConsulta.value === "") {
                alert('Por favor, seleccione un tipo de consulta.');
                isValid = false;
            }
            if (especialidad && especialidad.value === "") {
                alert('Por favor, seleccione una especialidad.');
                isValid = false;
            }
            if (centroAtencion && centroAtencion.value === "") {
                alert('Por favor, seleccione un centro de atención.');
                isValid = false;
            }
            if (!selectedTimeSlot) {
                alert('Por favor, seleccione una fecha y hora para su cita.');
                isValid = false;
            }
        }

        if (!isValid) {
            e.preventDefault(); // Evita el envío del formulario si hay errores
        } else {
            alert('Formulario enviado correctamente. Gracias por contactarnos!');
            form.reset(); // Resetea el formulario si todo está bien
            if (form.id === 'reserva-form') {
                document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('selected'));
            }
        }
    });
});

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

            if (!validateField({value: password}, passwordRegex, "La contraseña debe tener al menos 10 caracteres, una letra mayúscula, una minúscula, un número y un símbolo.") ||
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

    // Funcionalidad del calendario para la página de Agenda tu Hora
    const weekSchedule = document.querySelector('.week-schedule');
    const prevWeekBtn = document.getElementById('prevWeek');
    const nextWeekBtn = document.getElementById('nextWeek');
    const currentWeekSpan = document.getElementById('currentWeek');

    if (weekSchedule && prevWeekBtn && nextWeekBtn && currentWeekSpan) {
        let currentDate = new Date();
        currentDate.setDate(currentDate.getDate() - currentDate.getDay() + 1);

        function updateWeekDisplay() {
            const weekStart = new Date(currentDate);
            const weekEnd = new Date(currentDate);
            weekEnd.setDate(weekEnd.getDate() + 4);
            currentWeekSpan.textContent = `${weekStart.toLocaleDateString()} - ${weekEnd.toLocaleDateString()}`;
        }

        function generateTimeSlots() {
            const timeSlots = document.querySelectorAll('.time-slots');
            timeSlots.forEach(daySlots => {
                daySlots.innerHTML = '';
                for (let hour = 9; hour < 18; hour++) {
                    const timeSlot = document.createElement('div');
                    timeSlot.className = 'time-slot';
                    timeSlot.textContent = `${hour}:00`;
                    timeSlot.addEventListener('click', function() {
                        document.querySelectorAll('.time-slot').forEach(slot => slot.classList.remove('selected'));
                        this.classList.add('selected');
                    });
                    daySlots.appendChild(timeSlot);
                }
            });
        }

        prevWeekBtn.addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() - 7);
            updateWeekDisplay();
        });

        nextWeekBtn.addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() + 7);
            updateWeekDisplay();
        });

        updateWeekDisplay();
        generateTimeSlots();
    }
});
document.querySelectorAll('input[name="telefono"]').forEach(input => {
    input.addEventListener('input', function(e) {
        // Permitir solo números
        this.value = this.value.replace(/\D/g, '');
        // Limitar a 11 dígitos (56 + 9 dígitos)
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
        // Asegurarse de que comience con "56"
        if (this.value.length >= 2 && !this.value.startsWith("56")) {
            this.value = "56" + this.value.slice(2);
        }
    });
});