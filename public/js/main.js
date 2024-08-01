document.addEventListener('DOMContentLoaded', () => {
    console.log("JavaScript cargado correctamente");

    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('nav ul li a');

    window.addEventListener('scroll', () => {
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
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });

    // Funcionalidad para botones "Agenda tu hora"
    const agendarButtons = document.querySelectorAll('.cta-button');
    agendarButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Funcionalidad de agendar hora aún no implementada');
        });
    });

    // Manejo del formulario de contacto
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Formulario enviado. Gracias por contactarnos!');
            contactForm.reset();
        });
    }
});